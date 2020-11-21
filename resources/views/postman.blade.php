post man open koro.google chrome a na theke navigation bare icon a jao

methos select koto:
GET
<!-- Setting -->
Header
Key:accept Value:application/json
Key:content-type Value:application/json

route paste koro
rnter press koro

Setting/Manaage Enviroment/global a jao route save koro

<!-- authentication er jonno -->
post route chalao.er jonno j token paoa jabe ta controller madhome asbe.eta copy koro and get route a jao.GET option er niche Authorization ache.

Authorization>Bearer token>paste the token>sent

<!-- add -->
Header must accept>json and content-type>json
post>body>raw> raw er row te json option select kore
{
    "products":[
        {"id":1,"quantity":3},
        {"id":2,"quantity":5}
    ]

}

<!-- update -->
Header must accept>json and content-type>json
patch>body>x-www-form
key             value

quantity         5