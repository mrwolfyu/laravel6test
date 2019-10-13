# laravel6test

curl -X POST http://localhost:3000/api/register \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"name": "John", "email": "john.doe@sada.com", "password": "sada123", "password_confirmation": "sada123"}'


curl -X POST localhost:3000/api/login -H "Accept: application/json" -H "Content-type: application/json" -d "{\"email\": \"admin@test.com\", \"password\": \"sada\" }"

