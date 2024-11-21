# Relaxify

Configurazione TailwindCSS

- Scaricare da https://github.com/tailwindlabs/tailwindcss/releases/tag/v3.4.15 l'eseguibile per il proprio sistema
- Metterlo nella root del progetto e rinominarlo "tailwindcss.exe"

Eseguire questa linea di codice dalla root

```./tailwindcss -i ./src/css/input.css -o ./src/css/output.css --watch```

Per usare tailwindCSS mettere questo nell'head (modificando opportunamente il path di "output.css")

```<link rel="stylesheet" href="../css/output.css">```

Scaricare questa estensione VS per vedere i cambiamenti del codice in tempo reale

- https://marketplace.visualstudio.com/items?itemName=ritwickdey.LiveServer
