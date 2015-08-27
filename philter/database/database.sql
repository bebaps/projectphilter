CREATE DATABASE philter;

USE philter;

CREATE TABLE users (
    id int auto_increment primary key,
    name varchar(255),
    email varchar(255),
    password varchar(255),
    remember_token varchar(255),
    project varchar(255),
    budget int,
    rate int,
    timeline int,
    hours int,
    size varchar(255),
    framework varchar(255),
    theme varchar(255),
    cms varchar(255),
    type varchar(255),
    focus varchar(255),
    involvement varchar(255),
    boss varchar(255),
    created_at datetime,
    updated_at datetime
);

CREATE TABLE projects (
    id int auto_increment primary key,
    user_id int,
    lead_id int,
    project_name varchar(255),
    project_type varchar(255),
    project_description text,
    project_budget varchar(255),
    project_rate int,
    project_timeline varchar(255),
    project_days varchar(255),
    project_hours varchar(255),
    project_size varchar(255),
    project_framework varchar(255),
    project_theme varchar(255),
    project_cms varchar(255),
    project_score varchar(255),
    project_grade varchar(255),
    created_at datetime,
    updated_at datetime
);

CREATE TABLE leads (
    id int auto_increment primary key,
    lead_name varchar(255),
    lead_company varchar(255),
    lead_email varchar(255),
    lead_phone varchar(255),
    lead_address varchar(255),
    lead_city varchar(255),
    lead_state varchar(255),
    lead_zip varchar(255),
    lead_type varchar(255),
    lead_focus varchar(255),
    lead_involvement varchar(255),
    lead_boss varchar(255),
    created_at datetime,
    updated_at datetime
);