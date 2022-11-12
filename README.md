




PAGINATION:

    Method = GET.
    URL = api/movies?limit=(cantidad de columnas)&offset=(a partir de que pagina muestro)
    CODE = 200


ORDER:

    Method = GET.
    URL = api/movies?sort=(campo a ordenar)&order(ASC O DESC)
    CODE = 200


FILTER:

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



    SE PUEDEN PASAR VARIOS PARAMETROS JUNTOS:

    Method = GET.
    URL = api/movies?limit=(cantidad de columnas)&offset=(a partir de que pagina muestro)&filter(campo a filtrar)
    URL = api/movies?limit=(cantidad de columnas)&offset=(a partir de que pagina muestro)&sort=(campo a ordernar)&order=(ASC o DESC)
    URL = api/movies?sort=(campo a ordernar)&order=(ASC o DESC)&filter=(campo a filtrar)
    URL = api/movies?limit=(cantidad de columnas)&offset(a partir de que pagina muestro)&order=(ASC o DESC)
    URL = api/movies?limit=(cantidad de columnas)&offset=(a partir de que pagina muestro)&sort=(campo a ordernar)&order=(ASC o DESC)&filter=(campo a filtrar)