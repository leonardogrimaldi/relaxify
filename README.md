# Relaxify

## Configurazione TailwindCSS

- Scaricare da https://github.com/tailwindlabs/tailwindcss/releases/tag/v3.4.15 l'eseguibile per il proprio sistema
- Metterlo nella root del progetto e rinominarlo "tailwindcss.exe"

### Lanciare il compilatore di TailwindCSS

```./tailwindcss -i ./src/css/input.css -o ./src/css/output.css --watch```

Dovrà essere eseguita solo una volta quando si vuole modificare il codice tailwind. Tenere il terminale aperto ovviamente (il compilatore CSS di tailwind deve compilare il CSS)

## Per usare tailwindCSS mettere questo nell'head (modificando opportunamente il path di "output.css")

```<link rel="stylesheet" href="../css/output.css">```

## Scaricare questa estensione VS per vedere i cambiamenti del codice in tempo reale

https://marketplace.visualstudio.com/items?itemName=ritwickdey.LiveServer

## Icone utilizzate

https://heroicons.com/outline

## Estendere licenza Balsamiq

https://gist.github.com/HoussemNasri/c09e55e0e5f451aa10f8621a6680ba28

## Dimensioni font

- Intestazione pagina: 

text-xl