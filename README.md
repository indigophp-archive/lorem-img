# Lorem Img

A Lorem Img egy olyan API, amivel helykitöltő képeket tudunk használni, amik a szürke háttéren szereplő méreteknél egy fokkal izgalmasabbak.

## Használat

A képek URL-je így néz ki: `http://<domain>/<méretek>/<középrezárt szöveg>`

Ebben a domain az a domain, ahol ki van szolgálva az alkalmazás, a méret pedig egy szélesség x magasság formátumú képméret (pl: `400x300`), a szöveg pedig valami, amit szeretnénk, hogy a képen legyen a képméret helyett (ha nincs megadva, akkor a képméret marad alapból).

## Példa

`http://loremimg.teszt.ducktor.tk/400x200/`

![400x200](http://loremimg.teszt.ducktor.tk/400x200/)

`http://loremimg.teszt.ducktor.tk/400x200/Valami%20alap`

![Valami alap](http://loremimg.teszt.ducktor.tk/400x200/Valami%20alap)

