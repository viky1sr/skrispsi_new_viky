<?php

namespace App\HomeCare\Reservation\Repositories;

use App\HomeCare\MasterHomeCare\MasterHomeCare;
use App\HomeCare\MasterSpa\MasterSpa;
use App\HomeCare\MasterStatus\MasterStatus;
use App\HomeCare\Reservation\Exceptions\CreateReservationErrorException;
use App\HomeCare\Reservation\Repositories\Interfaces\ReservationRepositoryInterface;
use App\HomeCare\Reservation\Reservation;
use App\HomeCare\Reservation\Transformations\ReservationTransformable;
use App\Notifications;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Jsdecena\Baserepo\BaseRepository;

class ReservationRepository extends BaseRepository implements ReservationRepositoryInterface
{
    use ReservationTransformable;

    /**
     * MasterSpaRepository constructor.
     * @param Reservation $resevation
     */
    public function __construct(
        Reservation $resevation,
        Notifications $notification,
        MasterHomeCare $homecare,
        MasterSpa $babyspa
    )
    {
        parent::__construct($resevation);
        $this->model = $resevation;
        $this->notification = $notification;
        $this->homecare = $homecare;
        $this->babyspa = $babyspa;
    }

    public function createResevation(array $attributes)
    {
        try {

            $user = \Auth::user()->id;
            $random = rand(100,999).''.Carbon::now()->format('mdgi');
            $price = rand(100,999);

            $dataRepeat = "";
            switch ($attributes['reservation_repeat']) {
                case "1_minggu":
                    $dataRepeat = 1;
                    break;
                case "2_minggu":
                    $dataRepeat = 2;
                    break;
                case "3_minggu":
                    $dataRepeat = 3;
                    break;
                default:
                    $dataRepeat = 4;
            }

            if($attributes['type_reservation_id'] == 1){
                $getPrice =  $this->homecare->find($attributes['name_reservation_id']);
            } else {
                $getPrice = $this->babyspa->find($attributes['name_reservation_id']);
            }

            $pay = ($attributes['reservation_meet'] != 0 ? $attributes['reservation_meet'] * $dataRepeat : 1) * $getPrice->price + $price;

            if($user){
                $data = array_merge($attributes,
                    [
                        'user_id' => $user,
                        'total_price' => $pay,
                        'code_price' => $random
                    ]
                );
            } else {
                $data = $attributes;
            }

            $result = $this->create($data);

            if($result){
             $this->notification->create([
                 'user_id' => $user,
                 'data' => [
                     'name' => 'Create Reservation',
                     'status' => 'Pending',
                     'date' => Carbon::now()
                 ]
             ]);
            }
            return $result;
        } catch (QueryException $e){
            report($e);
            throw new createReservationErrorException('Sorry, error create reservation.');
        }
    }

    public function updateResevation(array $attributes, int $id)
    {
        try {
            if(count($attributes) > 0){
                $user = $this->model->find($id);
                $status = MasterStatus::where('status_id','=',$attributes['status_id'])->first();
                $arrData = [
                    'name' => 'Update Status Reservation',
                    'status' => $status->status_name,
                    'date' => Carbon::now()->format('Y-m-d G:i')
                ];

                $this->notification->create([
                    'user_id' => $user->user_id,
                    'data' => $arrData
                ]);
            }
            return $this->model->find($id)->update($attributes);
        } catch (QueryException $e){
            report($e);
            throw new createReservationErrorException('Sorry, error update reservation.');
        }
    }

    public function listResevation(array $params)
    {
        return $this->model
            ->where('status_id','>',0)
            ->when(isset($params['type_reservation_id']), function ($q) use($params) {
               $q->where('type_reservation_id','=',$params['type_reservation_id']);
            })
            ->when(isset($params['date']), function ($q) use($params){
                $q->whereMonth('created_at',$params['date']);
            })->count();
    }

    public function findResevation(int $id)
    {
        // TODO: Implement findResevation() method.
    }

    public function destroyResevation(int $id)
    {
        // TODO: Implement destroyResevation() method.
    }
}
