from django.db import models

# Create your models here.

class Data_Source(models.Model):
    name = models.TextField()

    
class Test_Name(models.Model):
    Name = models.TextField()
    MinValue = models.IntegerField(blank=True ,  null=True)
    MaxValue = models.IntegerField(blank=True ,  null=True)
    Data_Source = models.ForeignKey(Data_Source , on_delete=models.CASCADE )
    

class Data_Set(models.Model):
    Member_ID = models.TextField()
    Result_Name = models.TextField()
    Source = models.TextField()
    Data_Source = models.ForeignKey(Data_Source , on_delete=models.CASCADE)
    Test_Name = models.ForeignKey(Test_Name , on_delete=models.CASCADE )
    Result_Description = models.TextField()
    Numeric_Result = models.TextField()
    Patient_DOB = models.DateField()
    Patient_Gender = models.TextField()
    Date_Resulted = models.TextField()



