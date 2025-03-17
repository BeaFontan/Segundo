## Entorno para administrar un DNS via web

Hai 3 contedores:
- Servidor web
- Administrador web
- Cliente con utilidades para resolver os nomes (dig, host e nslookup)

Executar `docker compose up -d`

Conectarse co navegador web a http://localhost:9191/
A continuación crear un usuario e loguearse con el.  Desde ese momento pódense crear zonas e dominios novos.

Hai que ter coidado, porque admite calquera tipo de dato no campo de valores.

Aquí vai un exemplo dunha zona para un servidor DNS bind9

```
$TTL 86400      ; Tiempo de vida predeterminado (24 horas)
@    IN    SOA  ns1.ejemplo.com. admin.ejemplo.com. (
              2023121001 ; Serial (actualización de la zona)
              86400      ; Refresh (24 horas)
              3600       ; Retry (1 hora)
              1209600    ; Expiry (14 días)
              86400 )    ; Minimum TTL (1 día)

; Registros de nombre de servidor (NS)
@        IN    NS     ns1.ejemplo.com.
@        IN    NS     ns2.ejemplo.com.

; Registros de dirección (A) para servidores
ns1      IN    A      192.168.1.1
ns2      IN    A      192.168.1.2

; Registros de dirección IPv6 (AAAA) para servidores
ns1      IN    AAAA   2001:db8::1
ns2      IN    AAAA   2001:db8::2

; Registros CNAME
www      IN    CNAME  ejemplo.com.

; Registros de intercambio de correo (MX)
@        IN    MX     10 mail.ejemplo.com.
mail     IN    A      192.168.1.10

; Registros TXT para información adicional
@        IN    TXT    "v=spf1 include:spf.ejemplo.com ~all"
www      IN    TXT    "Este es un sitio web de ejemplo"

; Registros A adicionales
ejemplo  IN    A      192.168.1.100
```

