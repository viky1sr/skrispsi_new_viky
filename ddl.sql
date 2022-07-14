create table guest_reservations
(
    id               bigint unsigned auto_increment
        primary key,
    type_reservation bigint unsigned not null,
    name_reservation bigint unsigned not null,
    city             varchar(255)    not null,
    village          varchar(255)    not null,
    address          varchar(255)    not null,
    deleted_at       timestamp       null,
    created_at       timestamp       null,
    updated_at       timestamp       null
)
    collate = utf8mb4_unicode_ci;

create table master_home_cares
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255) not null,
    price      varchar(255) not null,
    deleted_at timestamp    null,
    created_at timestamp    null,
    updated_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table master_spas
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255) not null,
    price      varchar(255) not null,
    deleted_at timestamp    null,
    created_at timestamp    null,
    updated_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table master_statuses
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255) not null,
    deleted_at timestamp    null,
    created_at timestamp    null,
    updated_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table permissions
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255) not null,
    guard_name varchar(255) not null,
    created_at timestamp    null,
    updated_at timestamp    null,
    constraint permissions_name_guard_name_unique
        unique (name, guard_name)
)
    collate = utf8mb4_unicode_ci;

create table roles
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255) not null,
    guard_name varchar(255) not null,
    created_at timestamp    null,
    updated_at timestamp    null,
    constraint roles_name_guard_name_unique
        unique (name, guard_name)
)
    collate = utf8mb4_unicode_ci;

create table role_has_permissions
(
    permission_id bigint unsigned not null,
    role_id       bigint unsigned not null,
    primary key (permission_id, role_id),
    constraint role_has_permissions_permission_id_foreign
        foreign key (permission_id) references permissions (id)
            on delete cascade,
    constraint role_has_permissions_role_id_foreign
        foreign key (role_id) references roles (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table users
(
    id                bigint unsigned auto_increment
        primary key,
    first_name        varchar(255) not null,
    number_phone      varchar(255) null,
    email             varchar(255) not null,
    token             text         null,
    email_verified_at timestamp    null,
    password          varchar(255) not null,
    remember_token    varchar(100) null,
    created_at        timestamp    null,
    updated_at        timestamp    null,
    constraint users_email_unique
        unique (email)
)
    collate = utf8mb4_unicode_ci;

create table master_files
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255)              null,
    address    varchar(255)              null,
    path       varchar(255)              null,
    folder     varchar(255)              null,
    token      varchar(255)              null,
    created_by bigint unsigned           not null,
    updated_by bigint unsigned default 0 not null,
    created_at timestamp                 null,
    updated_at timestamp                 null,
    constraint master_files_created_by_foreign
        foreign key (created_by) references users (id)
)
    collate = utf8mb4_unicode_ci;

create table model_has_permissions
(
    permission_id bigint unsigned not null,
    model_type    varchar(255)    not null,
    model_id      bigint unsigned not null,
    primary key (permission_id, model_id, model_type),
    constraint model_has_permissions_model_id_foreign
        foreign key (model_id) references users (id)
            on delete cascade,
    constraint model_has_permissions_permission_id_foreign
        foreign key (permission_id) references permissions (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create index model_has_permissions_model_id_model_type_index
    on model_has_permissions (model_id, model_type);

create table model_has_roles
(
    role_id    bigint unsigned not null,
    model_type varchar(255)    not null,
    model_id   bigint unsigned not null,
    primary key (role_id, model_id, model_type),
    constraint model_has_roles_model_id_foreign
        foreign key (model_id) references users (id)
            on delete cascade,
    constraint model_has_roles_role_id_foreign
        foreign key (role_id) references roles (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create index model_has_roles_model_id_model_type_index
    on model_has_roles (model_id, model_type);

create table payments
(
    id         bigint unsigned auto_increment
        primary key,
    user_id    bigint unsigned           not null,
    file_id    bigint unsigned           not null,
    status_id  bigint unsigned           not null,
    updated_by bigint unsigned default 0 not null,
    deleted_at timestamp                 null,
    created_at timestamp                 null,
    updated_at timestamp                 null,
    constraint payments_file_id_foreign
        foreign key (file_id) references master_files (id),
    constraint payments_status_id_foreign
        foreign key (status_id) references master_statuses (id),
    constraint payments_user_id_foreign
        foreign key (user_id) references users (id)
)
    collate = utf8mb4_unicode_ci;

create table reservations
(
    id                bigint unsigned auto_increment
        primary key,
    user_id           bigint unsigned           not null,
    type_reservation  bigint unsigned           not null,
    name_reservation  bigint unsigned           not null,
    city              varchar(255)              not null,
    village           varchar(255)              not null,
    address           varchar(255)              not null,
    reservation_daily bigint unsigned default 0 not null,
    deleted_at        timestamp                 null,
    created_at        timestamp                 null,
    updated_at        timestamp                 null,
    constraint reservations_user_id_foreign
        foreign key (user_id) references users (id)
)
    collate = utf8mb4_unicode_ci;

create table reservation_genetics
(
    id              bigint unsigned auto_increment
        primary key,
    reservation_id  bigint unsigned not null,
    running_genetic int default 0   not null,
    deleted_at      timestamp       null,
    created_at      timestamp       null,
    updated_at      timestamp       null,
    constraint reservation_genetics_reservation_id_foreign
        foreign key (reservation_id) references reservations (id)
)
    collate = utf8mb4_unicode_ci;

