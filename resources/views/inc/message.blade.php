@php
    $message = $type = null;
    if(session()->has('success'))
        {
            $message = session()->get('success');
            $type = "success";
        }

    if(session()->has('error'))
        {
            $message = session()->get('error');
            $type = "danger";
        }
@endphp

{{--@if($message != null && $type != null)--}}
{{--    <x-alert :type="$type" :message="$message"></x-alert>--}}
{{--@endif--}}

@if($errors->any())
    @foreach($errors->all() as $error)
        <?php $type = 'danger'; ?>
        <x-alert :type="$type" :message="$error"></x-alert>
    @endforeach
@endif

