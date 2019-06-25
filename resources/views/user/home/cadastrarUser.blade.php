
@extends('user.templates.template')

@section('content')
        <div class="ui inverted segment">
            <div class="ui inverted secondary pointing menu">
                <div class="ui container">
                    <a class="active item">
                        Home
                    </a>
                    <a class="item">
                        Messages
                    </a>
                    <a class="item">
                        Friends
                    </a>
                </div>
            </div>
        </div>


        <div  class="ui internally celled grid container">
            <div class="ui small breadcrumb">
                <a class="section">Home</a>
                <i class="right chevron icon divider"></i>
                <a class="section">Registration</a>
                <i class="right chevron icon divider"></i>
                <div class="active section">Personal Information</div>
            </div>
        </div>


        <div id="custom" class="ui container">
            <div class="row">
                <div class="four wide column"></div>
                <div class="eight wide column">
                    <div class="ui teal labeled icon button">
                        Cadastrar usuário
                        <i class="add icon"></i>
                    </div>
                </div>
                <div class="four wide column"></div>
            </div>
        </div>
        </div>
@endsection
