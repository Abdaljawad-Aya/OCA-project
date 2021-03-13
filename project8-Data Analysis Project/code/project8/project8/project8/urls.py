"""project8 URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/3.1/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path
from App import views

urlpatterns = [
    path('', admin.site.urls , name='admin'),
    path('home', views.home , name='home'),
    path('index', views.index ),
    path('datasource/<id>', views.datasource , name='datasource'),
    path('custom/<id>', views.customChart , name='customChart'),
    path('dataset/<id>/<name>', views.dataset , name='dataset'),
    path('edit/<id>/', views.edit , name='edit'),
    path('test', views.test ),
    path('edit/<id>/', views.edit , name='edit'),
    path('delete/<id>/', views.delete , name='delete'),
    path('update', views.update , name="update"),
    path('register/', views.registerPage, name="register"),
    path('logout/',   views.logoutUser,   name="logout"),
    # path('', views.index),
]
