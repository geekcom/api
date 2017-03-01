# Workout Plan API
A simple REST API for workout plans.

---

##DOCUMENTATION:
How to authenticate
###Authentication:

**POST** http://localhost/api/public/api/v1/auth

```sh
http://localhost/api/public/api/v1/auth
```

_BODY_

**email**   example@email.com

**password**    **********

---

How to create a new user:
###User:

**POST** http://localhost/api/public/api/v1/user/new

```sh
http://localhost/api/public/api/v1/user/new
```

_HEADERS_

**Authorization**   Bearer + token generated in auth route

_BODY_

**name**   exampleName

**email**   example@email.com

**password**    **********

How to update a user:

**PUT** http://localhost/api/public/api/v1/user/update/{id_user}

```sh
http://localhost/api/public/api/v1/user/update/1
```

_HEADERS_

**Authorization**   Bearer + token generated in auth route

**Content-Type**   application/x-www-form-urlencoded

_BODY_

**name**   exampleName

**email**   example@email.com

**password**    **********
