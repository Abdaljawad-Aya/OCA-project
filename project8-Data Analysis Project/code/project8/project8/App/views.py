from django.shortcuts import render ,redirect
from pyexcel_xls import get_data as xls_get
from pyexcel_xlsx import get_data as get_data
from .models import Data_Source , Data_Set , Test_Name
import csv
from django.http import JsonResponse ,HttpResponse ,StreamingHttpResponse
import json
from django.core import serializers
from django.contrib.auth.decorators import login_required
from .forms   import OrderForm, CreateUserForm
from django.contrib.auth import authenticate, login, logout
from django.contrib      import messages

@login_required(login_url='/login')
def home(request):
    return render(request , "xlsxForm.html",{'data_sources' : Data_Source.objects.all() ,})

# Create your views here.

def index(request):
    if request.method == "POST":
        excel_file = request.FILES['file']
        
        if str(excel_file).split('.')[-1] == 'xls':

           data = xls_get(excel_file )
        elif str(excel_file).split('.')[-1] == 'xlsx':
            data = get_data(excel_file)
        
        
        
      
        dataSet = data[list(data)[0]]
        insertedNumber = 0
        for row in dataSet:
            if dataSet.index(row) == 0 :
                next
            else:   
                 datasource = Data_Source.objects.filter(name=row[dataSet[0].index('Data_Source')])
                 testname = Test_Name.objects.filter(Name=row[dataSet[0].index('Result_Name')])
                
                 print(datasource)

                
                 yield gen_message("Cheeking " + row[dataSet[0].index('Data_Source')] + " Row Number " + str(dataSet.index(row)) + "\n")
                 if len(datasource) == 0 :
                    datasource =Data_Source()
                    datasource.name = row[dataSet[0].index('Data_Source')]
                    datasource.save()
                    yield gen_message("<span style='color:green'>Insert " + datasource.name +" "+ str(datasource.id) + "</span>\n")
                    yield gen_message("Cheeking " + row[dataSet[0].index('Result_Name')] + " Row Number " + str(dataSet.index(row)) + "\n")
                 if len(testname) == 0 :
                    testname = Test_Name()
                    datasource = Data_Source.objects.filter(name=row[dataSet[0].index('Data_Source')])
                    testname.Name = row[dataSet[0].index('Result_Name')]
                    testname.Data_Source = datasource[0]
                    testname.save()
                    yield gen_message("<span style='color:green'>Insert " + testname.Name +" "+ str(testname.id) + "</span>\n")
                 dataset = Data_Set()
                 datasource = Data_Source.objects.filter(name=row[dataSet[0].index('Data_Source')])
                 testname = Test_Name.objects.filter(Name=row[dataSet[0].index('Result_Name')])
                 dataset.Name = row[dataSet[0].index('Result_Name')]
                 dataset.Member_ID = row[dataSet[0].index('Member_ID')]
                 dataset.Result_Name = row[dataSet[0].index('Result_Name')]
                 dataset.Source = row[dataSet[0].index('Data_Source')]
                 dataset.Data_Source = datasource[0]
                 dataset.Test_Name = testname[0]
                 dataset.Result_Description = row[dataSet[0].index('Result_Description')]
                 dataset.Numeric_Result = row[dataSet[0].index('Numeric_Result')]
                 dataset.Patient_DOB = row[dataSet[0].index('Patient_DOB')]
                 dataset.Patient_Gender = row[dataSet[0].index('Patient_Gender')]
                 dataset.Date_Resulted = row[dataSet[0].index('Date_Resulted')]
                 dataset.save()
                 yield gen_message("<span style='color:green'>Insert " + dataset.Name +" "+ str(dataset.id) + "</span> \n")
                 insertedNumber+=1
    yield gen_message("..........................................................\n")
    yield gen_message("<span style='color:orange'>..........................DONE............................</span>\n")
    yield gen_message("<span style='color:orange'>Total Row Inserted " + str(insertedNumber)+ "</span> \n")
    return HttpResponse('home')
@login_required(login_url='/login')
def datasource(request,id):
    return render(request ,"index.html" , {"testname":Test_Name.objects.filter(Data_Source=id) , 'datasource':Data_Source.objects.get(id=id) , 'data_sources' : Data_Source.objects.all() })
@login_required(login_url='/login')
def dataset(request,id,name):
    data = serializers.serialize('json', Data_Set.objects.filter(Data_Source=id , Test_Name=name ))
    return JsonResponse(data , safe=False)

def gen_message(msg):
    return 'data: {}'.format(msg)


def iterator():
    for i in range(10000):
        yield gen_message('iteration ' + str(i))

@login_required(login_url='/login')
def test(request):
    stream = index(request)
    response = StreamingHttpResponse(stream, status=200, content_type='text/event-stream')
    response['Cache-Control'] = 'no-cache'
    return response
    
@login_required(login_url='/login')
def customChart(request , id):
    return render(request ,"customChart.html" , {"testname":Test_Name.objects.filter(Data_Source=id) , 'datasource':Data_Source.objects.get(id=id) , 'data_sources' : Data_Source.objects.all() })

@login_required(login_url='/login')
def edit(request,id):
     if id:
        data = Data_Set.objects.get(id=id)
        return render(request, "editdata.html", context={'data': data})
@login_required(login_url='/login')
def update(request):
  if request.method == 'POST':
    if request.POST["Member_ID"] and request.POST["Result_Name"] and request.POST["Result_Description"]and request.POST["Patient_Gender"] :
      Data_Set.objects.filter(id=request.POST['id']).update(Member_ID=request.POST['Member_ID'],
                                                            Result_Name=request.POST['Result_Name'],
                                                            Result_Description=request.POST['Result_Description'],
                                                            Numeric_Result=request.POST['Numeric_Result'],
                                                            Patient_Gender=request.POST['Patient_Gender'])
                                                            
      
      return redirect("/datasource/"+str(Data_Set.objects.filter(id=request.POST['id']).first().Data_Source.id))
@login_required(login_url='/login')
def delete(request, id):
  datasetid=str(Data_Set.objects.filter(id=id).first().Data_Source.id)
  Data_Set.objects.filter(id=id).delete()
  return redirect("/datasource/"+datasetid)


def registerPage(request):
    if request.user.is_authenticated:
        return redirect('/login')
    else:
        form = CreateUserForm()
        if request.method == 'POST': 
                form = CreateUserForm(request.POST)
                
                if form.is_valid():
                    form.save()
                    user = form.cleaned_data.get('username')
                    
                    messages.success(request, 'Account was updated ' + user)              
                    return redirect('home')
                # else:
                #     error_messages.success.get(request, 'The two password fields didn’t match.' + user)
                  
    context ={'form':form}
    return render(request, 'register.html', context)

def logoutUser(request):
    logout(request)
    return redirect('/login')