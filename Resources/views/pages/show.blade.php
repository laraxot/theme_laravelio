@php($act = Str::camel($row->guid))
@can($act, $_panel)
    @include('pub_theme::pages.'.$row->guid)
@else
    {!! !Auth::check() ? redirect()->route('login') : '' !!}
    @include('pub_theme::errors.403',['message'=>'not can ['.$act.'] on ['.class_basename($_panel).']'])
@endcan
