# Landing page

Temporary holding page for brys-projects.be, shown while the WordPress site
is being built. Plain HTML and CSS in one file. No build step, no external
requests. The logo sits next to it as a PNG.

## Files

- `index.html` — the page
- `brys-projects_logo.png` — logo, 500x221

## Where it is hosted

Combell, inside the `shared2.be` hosting package. The domain is a subsite
there, so the document root is:

```
/data/sites/web/shared2be/subsites/brys-projects.be
```

Upload both files into that folder over SSH or FTP. The FTP user
`shared2be@shared2be` starts at `/`, so you still need to go into
`subsites/brys-projects.be/`.

## DNS

The domain is registered at TransIP, and TransIP also holds the nameservers,
so DNS records are changed there. Combell only serves the site.

| Record | Value |
| --- | --- |
| A | 176.62.168.21 |
| AAAA | 2a00:1c98:1000:1033:0:4:6137:625f |
| CNAME www | brys-projects.be. |

The AAAA record is important. Every website on the hosting has its own IPv6
address, so you cannot use the package IPv6 shown on the Combell overview
page. Take the one listed for this website under "Domeinnamen & SSL". With
the wrong IPv6 the domain still answers, but from another website, which
looks like the upload or the certificate failed.

SSL is a Let's Encrypt certificate from Combell and covers both
`brys-projects.be` and `www.brys-projects.be`. HTTP redirects to HTTPS.

## Checking if it is live

```sh
curl -sI https://brys-projects.be/
```

A working page returns 200 and about 2600 bytes. If you get 52 bytes with the
text "Please stand by while configuration is in progress", you are reaching
Combell's default page and the files are not in the document root.
