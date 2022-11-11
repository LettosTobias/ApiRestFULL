

PAGINATION:

    Method = GET.
    URL = api/movies?limit=(numero)&offset=(numero)
    CODE = 200


ORDER:

    Method = GET.
    URL = api/movies?sort=(campo a order)&order(ASC O DESC)
    CODE = 200


FILTER BY GENDER:

    Method = GET.
    URL = api/movies?filter=(campo a filtrar)
    CODE = 200

GET MOVIE BY ID:

    Method = GET.
    URL = api/movie/:ID
    CODE = 200

DELETE MOVIE:

    Method = DELETE.
    URL = api/Movie/:ID
    CODE = 200

ADD A MOVIE:

    Method = POST.
    URL = api/Movies
    CODE = 201

EDIT A MOVIE:

    Method = PUT.
    URL = movies/:ID
    CODE = 201


