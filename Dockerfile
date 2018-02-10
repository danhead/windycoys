FROM node:8.9.4-alpine

COPY ./ /var/www/html/wp-content/themes
WORKDIR /var/www/html/wp-content/themes

ENV NODE_ENV production

RUN npm install

RUN npm run css:compile

RUN mv theme windycoys
