-- PA tables.
-- User data; populated when a user registers.
create table `user` (
  email varchar(254) not null,
  password varchar(24) not null,
  first_name varchar(40) not null,
  last_name varchar(40) not null,
  phone varchar(15) not null,
  age int not null,
  is_student boolean not null,
  is_employed boolean not null,
  primary key (email)
);

-- CR tables.
-- Service data; the services available including a path to an image to be shown, e.g., Yoga
create table service (
  service_id int not null,
  name varchar(40) not null,
  image_path varchar(128) not null,
  primary key (service_id)
);

-- Service instruction data; used when a service is selected to pick the service type to perform; e.g., Yoga -> Beginner
create table service_instruction (
  service_id int not null,
  service_type varchar(40) not null,
  path varchar(128) not null,
  primary key (service_id, service_type),
  foreign key (service_id) references service (service_id)
);

-- User service data; used to record when and how long a user has performed a service,
-- e.g., shekhar@rmit.edu.au performed Yoga Advanced on 04/09/2021 for 45 minutes.
create table user_service (
  user_service_id int auto_increment not null,
  email varchar(254) not null,
  service_id int not null,
  service_type varchar(40) not null,
  date_performed date not null,
  duration_minutes int not null,
  primary key (user_service_id),
  foreign key (email) references user (email),
  foreign key (service_id, service_type) references service_instruction (service_id, service_type)
);

-- DI tables.
-- Meal data; represents the meal items available including type, e.g., Vegan meal of Greek-inspired cauliflower stew
-- NOTE: The image path is optional for a meal; you can decide if you want to include an image for your meals.
create table meal (
  meal_id int not null,
  name varchar(128) not null,
  type varchar(40) not null,
  kilojoules int not null,
  image_path varchar(128) null,
  primary key (meal_id)
);

-- User meal data; used to track the meal plan for a user, e.g.,
-- shekhar@rmit.edu.au having:
--   -> 2 servings of Greek-inspired cauliflower stew
--   -> 1 serving of Vegetarian bolognese
-- NOTE: The servings field allows fractions, e.g., 0.5 (half) a serving of apples, 1.5 servings of bananas, etc...
create table user_meal (
  email varchar(254) not null,
  meal_id int not null,
  servings double not null,
  primary key (email, meal_id),
  foreign key (email) references user (email),
  foreign key (meal_id) references meal (meal_id)
);
