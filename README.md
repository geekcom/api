#Workout Plan API
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/geekcom/api/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/geekcom/api/?branch=master)

###About
This is a REST API for workout plans, [here](https://github.com/geekcom/api) is webapp for this API

---
##How to use?

##Authentication
####Auth - User Authentication 
`POST`
```sh
http://localhost/api/public/api/v1/auth
```

**BODY**

**email**   example@email.com

**password**    **********

---



##User
####User - Create a new User 

`POST`
```sh
http://localhost/api/public/api/v1/user
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

**BODY**

**first_name**   examplefirstName

**last_name**   examplelastName

**email**   example@email.com

**password**    **********

####User - Show User data 

`GET`
```sh
http://localhost/api/public/api/v1/user/{id_user}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

###User - Update a User's data
`PUT`

```sh
http://localhost/api/public/api/v1/user/update/{id_user}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

**Content-Type**   application/x-www-form-urlencoded

**BODY**

**first_name**   examplefirstName

**last_name**   examplelastName

**email**   example@email.com

**password**    **********


###User - Delete a User
`DELETE`

```sh
http://localhost/api/public/api/v1/user/{id_user}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**



##Workout Type
####Workout Type - Create a new Workout Type

`POST`
```sh
http://localhost/api/public/api/v1/workout_type
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

**BODY**

**name**   exampleName

**description**   description example


####Workout Type - Show a workout type

`GET`
```sh
http://localhost/api/public/api/v1/workout_type/{id_workout_type}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

####Workout Type - List all workout types
`GET`

```sh
http://localhost/api/public/api/v1/workout_type/list
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

**Content-Type**   application/x-www-form-urlencoded

**BODY**

**name**   exampleName

**email**   example@email.com

**password**    **********


####Workout Type - Update a workout type
`PUT`

```sh
http://localhost/api/public/api/v1/workout_type/{id_workout_type}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

**BODY**

**name**   exampleName

**description**   description example

####Workout Type - Delete a workout type
`DELETE`

```sh
http://localhost/api/public/api/v1/workout_type/{id_workout_type}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**



##Workout Plan
####Workout Plan - Create a new Workout Plan

`POST`
```sh
http://localhost/api/public/api/v1/workout_plan
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

**BODY**

**fk_workout_type** workout type

**fk_user** User 

**date** Date


####Workout Plan - Show a Workout Plan

`GET`
```sh
http://localhost/api/public/api/v1/workout_plan/{id_workout_plan}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

####Workout Plan - Update a  Workout Plan
`PUT`

```sh
http://localhost/api/public/api/v1/workout_plan/{id_workout_plan}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

**Content-Type**   application/x-www-form-urlencoded

**BODY**

**name**   exampleName

**email**   example@email.com

**password**    **********


####Workout Plan - Update a Workout Plan
`PUT`

```sh
http://localhost/api/public/api/v1/workout_type/{id_workout_type}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

**BODY**

**fk_workout_type** workout type

**fk_user** User 

**date** Date

####Workout Plan - Delete a Workout Plan
`DELETE`

```sh
http://localhost/api/public/api/v1/workout_plan/{id_workout_plan}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**