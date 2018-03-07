FROM node:9.7.1-alpine

COPY ./ /var/www/html/wp-content/themes
WORKDIR /var/www/html/wp-content/themes

ENV NODE_ENV production

RUN apk add --no-cache curl

RUN npm install

CMD ["sh", "build.sh"]
