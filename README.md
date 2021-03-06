# LeaveManagementSystem

โปรเจคนี้จัดทำขึ้นโดยกลุ่ม GetA ss2 :a: ซึ่งเป็นผลงานปลายภาคการศึกษา วิชา **01418443 Web Technology and Web Services**
โดยตัวโปรเจคนี้ เป็น Web Service ที่สร้างขึ้นมาเพื่อช่วยในการจัดการระบบการลางานภายในองค์กร

#### ภาษาและเครื่องมือต่างๆ
PHP HTML JAVASCRIPT Laravel

## ขั้นตอนเริ่มต้นก่อนการใช้งาน

ก่อนเริ่มต้นใช้งาน จะต้องทำการเตรียมโปรแกรมสำหรับรัน Localhost Web Service เช่น **Xampp** หรือ **Laragon** เป็นต้น และทำการดาวน์โหลดหรือ clone ไฟล์โปรเจคจาก github เข้าสู่เครื่องคอมพิวเตอร์ก่อน โดยหากเลือกใช้ Laragon ให้เลือกดาวน์โหลดหรือ clone ไปที่ folder laragon/www/ หรือหากใช้งาน Xampp ให้เลือกดาวน์โหลดหรือ clone ไปที่ folder Xampp/htdocs/ แล้วแก้ไขชื่อไฟล์ .env.example เป็น .env

เปิดใช้งาน DatabaseServer จากนั้นให้สร้าง Database และ User สำหรับเข้าถึงและแก้ไข Database ที่สร้าง นำชื่อ Database Username และ Password ไปใส่ในไฟล์ .env

จากนั้นให้รันคำสั่ง
```
composer install
npm install
php artisan key:generate
php artisan migrate --seed
```

WebServer ของคุณจะเปิดอยู่ที่ port 8000

## ขั้นตอนการใช้งาน

เมื่อเริ่มใช้งาน ให้ทำการเปิดใช้งาน Localhost Web Service และจะสามารถใช้งาน Web service นี้ได้ โดยการเข้าที่ Browser url localhost:8000/ หรือ 127.0.0.1:8000/

โดยระบบจะมีการทำงานเป็น 2 ส่วน
1. ส่วนของ Admin
  เป็นส่วนสำหรับให้ admin ใช้ในการจัดการระบบโดยรวม ไม่ว่าจะเป็นการสร้างหรือลบ user และ department หรือการปรับแต่งรูปแบบของการลาในบริษัท
2. ส้วนของ User
  เป็นส่วนสำหรับให้พนักงานในองค์กรใช้งาน โดยตัวระบบจะสามารถสร้างการขอลางานส่งให้หัวหน้าได้ สามารถอนุมัติหรือปฏิเสธการลางานที่ลูกน้องขอมาได้ และยังสามารถมอบหมายงานให้กับลูกน้องของตัวเองได้ด้วย

โดยการใช้งานในส่วนของ Admin จะเข้าใช้งานได้ด้วยการเข้าที่ url localhost:8000/admin/ และในส่วนของ User นั้นสามารถเข้าใช้งานได้ตาม url ปกติ

เมื่อเริ่มต้นการใช้งานครั้งแรก Admin จะต้องเข้าสู่ระบบด้วย 
```
Username: administrator@example.com
Password: adminpassword
```
จากนั้น admin ก็ต้องสร้าง user ให้กับพนักงานแต่ละคน พร้อมทั้งกำหนดแผนก (Department) และหัวหน้า (Supervisor) ให้กับพนักงานแต่ละคนด้วย
admin จะต้องกำหนดประเภทของการลา (Leave) รวมถึงจำนวนวันที่ลาของแต่ละประเภท แล้วจึงนำ username password ไปแจกจ่ายให้พนักงานแต่ละคนได้
