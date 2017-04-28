# Workout Plan API
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/geekcom/api/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/geekcom/api/?branch=master)

### About
This is a generic REST API for workout plans, [here](https://github.com/geekcom/api) is webapp for this API

---
## How to use?


## Authentication
#### Auth - User Authentication 
`POST`
```sh
http://localhost:8000/api/v1/auth
```

**BODY**

**email**   example@email.com

**password**    **********

---



## Users
#### Users - Create a new User 

`POST`
```sh
http://localhost:8000/api/v1/users
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

**BODY**

**first_name**   examplefirstName

**last_name**   examplelastName

**email**   example@email.com

**password**    **********

#### Users - Show User data 

`GET`
```sh
http://localhost:8000/api/v1/users/{id_user}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

### Users - Update a User's data
`PUT`

```sh
http://localhost:8000/api/v1/users/{id_user}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

**Content-Type**   application/x-www-form-urlencoded

**BODY**

**first_name**   examplefirstName

**last_name**   examplelastName

**email**   example@email.com

**password**    **********


### Users - Delete a User
`DELETE`

```sh
http://localhost:8000/api/v1/users/{id_user}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**



## Workout Types
#### Workout Types - Create a new Workout Type

`POST`
```sh
http://localhost:8000/api/v1/workout_types
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

**BODY**

**name**   exampleName

**description**   description example


#### Workout Types - Show a workout type

`GET`
```sh
http://localhost:8000/api/v1/workout_types/{id_workout_type}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

#### Workout Types - List all workout types
`GET`

```sh
http://localhost:8000/api/v1/workout_types/list
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

**Content-Type**   application/x-www-form-urlencoded

**BODY**

**name**   exampleName

**email**   example@email.com

**password**    **********


#### Workout Types - Update a workout type
`PUT`

```sh
http://localhost:8000/api/v1/workout_types/{id_workout_type}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

**BODY**

**name**   exampleName

**description**   description example

#### Workout Types - Delete a workout type
`DELETE`

```sh
http://localhost:8000/api/v1/workout_types/{id_workout_type}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**



## Workout Plans
#### Workout Plans - Create a new Workout Plan

`POST`
```sh
http://localhost:8000/api/v1/workout_plans
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

**BODY**

**fk_workout_type** workout type

**fk_user** User 

**date** Date


#### Workout Plans - Show a Workout Plan

`GET`
```sh
http://localhost:8000/api/v1/workout_plans/{id_workout_plan}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

#### Workout Plans - Update a  Workout Plan
`PUT`

```sh
http://localhost:8000/api/v1/workout_plans/{id_workout_plan}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

**Content-Type**   application/x-www-form-urlencoded

**BODY**

**name**   exampleName

**email**   example@email.com

**password**    **********


#### Workout Plans - Update a Workout Plan
`PUT`

```sh
http://localhost:8000/api/v1/workout_types/{id_workout_type}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

**BODY**

**fk_workout_type** workout type

**fk_user** User 

**date** Date

#### Workout Plans - Delete a Workout Plan
`DELETE`

```sh
http://localhost:8000/api/v1/workout_plans/{id_workout_plan}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**