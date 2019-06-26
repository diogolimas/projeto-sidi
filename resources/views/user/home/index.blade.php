
@extends('user.templates.template')

@section('content')



        <div  class="ui internally celled grid container">
            <div class="ui small breadcrumb">
                <a class="section">Home</a>
                <i class="right chevron icon divider"></i>
                <a class="section">Registration</a>
                <i class="right chevron icon divider"></i>
                <div class="active section">Personal Information</div>
            </div>
        </div>
s

        <div id="custom" class="ui grid container">
            <div class="row">
                <div class="four wide column">
                    <a class="link" href="{{url('/user/create')}}">
                        <div class="ui teal labeled icon button">
                            <i class="add icon "></i>
                            Cadastrar usuário
                        </div>
                    </a>
                </div>
                <div class="eight wide column">

                </div>
                <div class="four wide column">
                    <img width="80px" class="ui small circular image" src="http://barcarena.pa.gov.br/portal/img/perfil/padrao.jpg">
                </div>
            </div>
        </div>
        </div>
@endsection
