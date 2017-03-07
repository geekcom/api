#Workout Plan API
REST API for workout plans.

---

##DOCUMENTATION:
How to authenticate
####Authentication - `POST`
```sh
http://localhost/api/public/api/v1/auth
```

_`BODY`_

**email**   example@email.com

**password**    **********

---

##User
####User - Create a new User 

`POST`
```sh
http://localhost/api/public/api/v1/user
```

_HEADERS_

**Authorization Bearer + token generated in auth route**

_BODY_

**name**   exampleName

**email**   example@email.com

**password**    **********

####User - Show User data 

`GET`
```sh
http://localhost/api/public/api/v1/user/{id_user}
```

_HEADERS_

**Authorization Bearer + token generated in auth route**

###User - Update a User's data
`PUT`

```sh
http://localhost/api/public/api/v1/user/update/{id_user}
```

_HEADERS_

**Authorization Bearer + token generated in auth route**

**Content-Type**   application/x-www-form-urlencoded

_BODY_

**name**   exampleName

**email**   example@email.com

**password**    **********


###User - Delete a User
`DELETE`

```sh
http://localhost/api/public/api/v1/user/{id_user}
```

_HEADERS_

**Authorization Bearer + token generated in auth route**