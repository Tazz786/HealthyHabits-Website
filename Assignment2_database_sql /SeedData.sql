-- Create users.
insert into user
(email, password, first_name, last_name, phone, age, is_student, is_employed) values
('shekhar@rmit.edu.au', 'Shekhar-12', 'Shekhar', 'Kalra', '+61 412 456 789', 30, false, true);

insert into user
(email, password, first_name, last_name, phone, age, is_student, is_employed) values
('s1234567@student.rmit.edu.au', 'Matthew-12', 'Bob', 'Smith', '+61 498 765 432', 21, true, false);

-- Create services.
insert into service (service_id, name, image_path) values (1, 'Yoga', 'assets/images/yoga.png');
insert into service (service_id, name, image_path) values (2, 'Meditation', 'assets/images/meditation.png');
insert into service (service_id, name, image_path) values (3, 'Stretching', 'assets/images/stretching.png');
insert into service (service_id, name, image_path) values (4, 'Healthy habits', 'assets/images/healthy-habits.png');

-- Create service instructions.
insert into service_instruction
(service_id, service_type, path) values
(1, 'Beginner', 'assets/video/yoga-beginner.mp4');

insert into service_instruction
(service_id, service_type, path) values
(1, 'Intermediate', 'assets/video/yoga-intermediate.mp4');

insert into service_instruction
(service_id, service_type, path) values
(1, 'Advanced', 'assets/video/yoga-advanced.mp4');

insert into service_instruction
(service_id, service_type, path) values
(2, 'Video', 'assets/video/meditation.mp4');

insert into service_instruction
(service_id, service_type, path) values
(2, 'Audio', 'assets/audio/meditation.mp3');

insert into service_instruction
(service_id, service_type, path) values
(3, 'Active Stretching', 'assets/video/stretching-active.mp4');

insert into service_instruction
(service_id, service_type, path) values
(3, 'Passive Stretching', 'assets/video/stretching-passive.mp4');

insert into service_instruction
(service_id, service_type, path) values
(3, 'Dynamic Stretching', 'assets/video/stretching-dynamic.mp4');

insert into service_instruction
(service_id, service_type, path) values
(4, 'Vegan', ' ');

insert into service_instruction
(service_id, service_type, path) values
(5, 'Vegeterian', ' ');


-- Creates meal in the database.
insert into meal
(meal_id, name, type, kilojoules, image_path) values
(1, 'Vegan lasagne', 'Vegan', 2159, 'assets/images/Vegan lasagne.jpeg');

insert into meal
(meal_id, name, type, kilojoules, image_path) values
(2, 'Greek-inspired cauliflower stew', 'Vegan', 1301, 'assets/images/Greek-inspired cauliflower stew.jpeg');

insert into meal
(meal_id, name, type, kilojoules, image_path) values
(3, 'Vegetarian wellington', 'Vegetarian', 2272, 'assets/images/Vegetarian wellington.jpeg');

insert into meal
(meal_id, name, type, kilojoules, image_path) values
(4, 'Vegetarian bolognese', 'Vegetarian', 1895, 'assets/images/Vegetarian bolognese.jpeg');

-- More meals for Vegan
insert into meal
(meal_id, name, type, kilojoules, image_path, cat_type) values
(5, 'Macro Buddha Bowl', 'Vegan', 492, '', 1);

insert into meal
(meal_id, name, type, kilojoules, image_path, cat_type) values
(6, 'Eggplant and Chickpea Curry', 'Vegan', 483, '', 1);

insert into meal
(meal_id, name, type, kilojoules, image_path, cat_type) values
(7, 'Stuffed Pumpkin', 'Vegan', 3000, '', 1);

insert into meal
(meal_id, name, type, kilojoules, image_path, cat_type) values
(8, 'Choclate Protein Shake', 'Vegan', 2900, '', 1);

-- More meals for Vegan
insert into meal
(meal_id, name, type, kilojoules, image_path, cat_type) values
(9, 'Granola Homemade', 'Vegetarian', 598, '', 2);

insert into meal
(meal_id, name, type, kilojoules, image_path, cat_type) values
(10, 'Bannana OatMeal Smoothie', 'Vegetarian', 2151, '', 2);

insert into meal
(meal_id, name, type, kilojoules, image_path, cat_type) values
(11, 'Fettuccine alfredo', 'Vegetarian', 1000, '', 2);

insert into meal
(meal_id, name, type, kilojoules, image_path, cat_type) values
(12, 'Crispy Breaded Tofu Steaks', 'Vegetarian', 1084, '', 2);

