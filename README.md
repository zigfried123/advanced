# advanced

выполнить миграции
 
 5. В backend GridView(Pjax, сортировка, фильтрация) для Service (ServiceController, ServiceSearch, views)
    в common модуль service и модель Service
    во frontend REST controller c с методами для получения сервисов по городу(город можно по ид передавать, сейчас строкой реализовано) и сервиса по id.
    контроль методов доступа и CORS
    
 6. Мягкое удаление реализовано в виде поведения, которое навешивается на класс Active record, в нем указывается атрибут, 
 который является флагом. В классе реализованы 3 метода: удаление с проверкой, проверка, восстановление с проверкой. 
