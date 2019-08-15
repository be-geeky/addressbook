#Addressbook Management


**Steps to install**

- Clone repository
  ```shell 
  $ git clone https://github.com/be-geeky/addressbook.git
  $ cd addressbook
- Run bellow commands

   ```shell
   $ git checkout -b dev 
   $ composer install
   $ cp .env.example .env //Make your changes 
   $ php artisan migrate 
   $ php artisan db:seed
  
**RESTFull Implementation**    
- Get Addresses
   Method: GET
   url: http://127.0.0.1:8001/api/addresses/
- Add Address
  ```  
  Method: POST
        url: http://127.0.0.1:8001/api/addresses
        Request Payload: 
    {
      "title": "Home",
      "address_line_1": "2322222222222",
      "address_line_2": "two",
      "address_line_3": "three",
      "pincode": "sdsdsd",
      "city": "city",
      "state": "state",
      "country": "Japan",
      "type": "default_from",
      "name": "sdsd",
      "phone": "43434343"
    }
  Headers: Content-Type:application/json, Accept:application/json 
- Update Address
    ```
     Method: PUT
     url: http://127.0.0.1:8001/api/addresses/{id}
     Request Payload: 
     Headers: Content-Type:application/json, Accept:application/json              
     Request Payload: 
     {
       "title": "Office",
       "address_line_1": "2322222222222",
       "address_line_2": "two",
       "address_line_3": "three",
       "pincode": "sdsdsd",
       "city": "city",
       "state": "state",
       "country": "Japan",
       "type": "default_from",
       "name": "sdsd",
       "phone": "43434343"
     }
     Headers: Content-Type:application/json, Accept:application/json
- Get Single Address
   ```
     Method: GET
     url: http://127.0.0.1:8001/api/addresses/{id}

  
  # There is only basic validation implementation
  # Authentication for REST Apis (JWT/Passport) not implemented
  # CSS Styling might not be proper
