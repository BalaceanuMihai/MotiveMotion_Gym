# MotiveMotion_Gym

## Overview
**MotiveMotion Gym** is a web application designed for fitness and strength training enthusiasts. It provides users with an easy-to-use platform to manage their memberships, track their progress in the gym, and participate in personalized training sessions with trainers.  
It is a PHP-based application built using the MVC(Model-View-Controller) design patern.

## Features

- **Workout Tracking**: Users can create and view their workout progress.
- **Customized Workout Plans**: Create workouts based on difficulty level (beginner, intermediate, advanced).
- **Membership Management**: Users can add and track their gym memberships, including type and duration.
- **Statistics and Reports**: View personal progress through detailed graphs and statistics.

## Folder structure
- **config/**: Configuration files, including the router setup and database connection.
- **controllers/**: Controller classes handling application logic and communication between models and views.
- **models/**: Model classes representing data and business logic.
- **views/**: View files for the user interface, outputting data.
- **migrations/**: SQL files containing database schema changes for tasks.
- **public/**: Publicly accessible files

## Basic authentification for users + creating a new account ( register )
- You can make an account ( first name, last name, email, password)
- You can log in only using your email and password

## CRUD operations only for memberships ( for now )
- Creating a new membership
- Updating a membership
- Deleting a membership

## Permisions for different types of users
 - Admin - list of memberships( can make changes to them), list of workout_plans
 - Trainer - list of workout plans
 - User - Active and inactive memberships
