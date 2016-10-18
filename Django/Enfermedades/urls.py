from django.conf.urls import url

from . import views

urlpatterns = [
# ex: /polls/
url(r'^index.html', views.IndexView.as_view(), name='index'),
# ex: /polls/5/
url(r'^detail.html/(?P<question_id>\d+)$', views.DetailView.as_view(), name='detail'),
# ex: /polls/5/results/
url(r'^results.html', views.ResultsView.as_view(), name='results'),
#url(r'^(?P<question_id>[0-9]+)/vote/$', views.vote, name='vote'),
]