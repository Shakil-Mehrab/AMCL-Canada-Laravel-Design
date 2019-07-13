{!! Form::open(['url'=>'upload','files'=>true]) !!}
{!! Form::file('file_name') !!}
{!! Form::submit('Submit') !!}
{!! Form::close() !!}
composer.json
"laravelcollective/html":"~5.0"
config/app
provider
'Collective\Html\HtmlServiceProvider',
alias
'Form'=>'Collective\Html\FormFacade',
'Html'=>'Collective\Html\HtmlFacade', 