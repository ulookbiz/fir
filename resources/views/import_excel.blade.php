@extends('layouts.master')
@section('content')
@section('title', 'Import from Excel')

<h3 align="center">Import from Excel file</h3>

<br>
@if(count($errors) > 0)
    <div class="alert alert-danger">
        Upload Validation Error<br><br>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<form method="post" action="{{url('/import_excel')}}" enctype="multipart/form-data">

    {{ csrf_field() }}
    <div class="form-group">
        <table class="table">
            <tr>
                <td width="40%" align="right"><label>Select File for Upload</label></td>
                <td width="30">
                    <input type="file" name="select_file" />
                </td>
                <td width="30%" align="left">
                    <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                </td>
            </tr>
            <tr>
                <td width="40%" align="right"></td>
                <td width="30"><span class="text-muted">.xls, .xslx</span></td>
                <td width="30%" align="left"></td>
            </tr>
        </table>
    </div>
</form>

<br>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Customer Data</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>Английское слово</th>
                    <th>Русское слово</th>
                    <th>Английская фраза</th>
                    <th>Русская фраза</th>
                    <th>Файл картинки</th>
                    <th>Короткое аудио</th>
                    <th>Длинное аудио</th>
                    <th>Копирайт</th>
                </tr>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->e_word }}</td>
                        <td>{{ $row->r_word }}</td>
                        <td>{{ $row->e_phrase }}</td>
                        <td>{{ $row->r_phrase }}</td>
                        <td>{{ $row->pic_name }}</td>
                        <td>{{ $row->short_audio }}</td>
                        <td>{{ $row->long_audio }}</td>
                        <td>{{ $row->copyright }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
