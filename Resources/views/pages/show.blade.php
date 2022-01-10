@php
//proposta per spostare il controllo nelle policy del modello interessato e non in pagepanelpolicy:
//se ti piace, perchè non mettere questa blade in theme::pages.show, invece di scrivere un page.show in ogni tema?

//$model = xotModel(Str::remove('-create', $params['item0']));
//$_panel = Panel::get($model);
@endphp
@php($act = Str::camel($row->guid))
@can($act, $_panel)
    @include('pub_theme::pages.'.$row->guid)
@else
    {!! !Auth::check() ? redirect()->route('login') : '' !!}
    @include('pub_theme::errors.403',['message'=>'not can ['.$act.'] on ['.class_basename($_panel).']'])
@endcan
