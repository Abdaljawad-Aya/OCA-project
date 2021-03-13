from django import template
from App.models import Data_Source , Data_Set
from django.http import HttpResponse
from django.template.loader import get_template




register = template.Library()

def length(value,id):

       
       return len(Data_Set.objects.filter(Data_Source=id))


register.filter('length',length)

def gender(test, source):
       parse = source.split(',')
       gender = parse[1]
       source = parse[0]
     

       return len(Data_Set.objects.filter(Data_Source=test,  Result_Name=source ,Patient_Gender=gender))

register.filter('gender',gender)


def allgender(source, gender):

       return len(Data_Set.objects.filter(Data_Source=source, Patient_Gender=gender))

register.filter('allgender',allgender)
