@extends('layout')

@section('title', 'Form Super Form')

@section('content')
    @if(session('status'))
        <span style="padding: 20px 0px 20px 0px; font-size: 24px; color: green;">{{session('status')}}</span>
    @endif

    <form method="POST" action="/form" class="form">
        @csrf()

        <h1>Регистрация на конференцию</h1>

        <label class="titleInputText">
            Ваше ФИО:<br>
            <input class = "input" type="text" name="name" id="" value="{{ old('name') }}">
        </label>
        @error('name')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror


        <label class="titleInputText">
            Ваша почта:<br>
            <input class = "input" type="text" name="email" id="" value="{{ old('email') }}">
        </label>
        @error('email')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror


        <label class="titleInputText">
            Ваш номер телефона:<br>
            <input class = "input" type="text" name="phone" id="" value="{{ old('phone') }}">
        </label>
        @error('phone')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror


        <label class="titleInputText">
            Направление:<br>
            <div>
                <label>
                    <input type="radio" name="direction" value="Искусственный интеллект" {{ old('direction') == "Искусственный интеллект" ? "checked" : "" }}>
                    Искусственный интеллект
                </label>
            </div>
            <div>
                <label>
                    <input type="radio" name="direction" value="Кибербезопасность" {{ old('direction') == "Кибербезопасность" ? "checked" : "" }}>
                    Кибербезопасность
                </label>
            </div>
            <div>
                <label>
                    <input type="radio" name="direction" value="Разработка ПО" {{ old('direction') == "Разработка ПО" ? "checked" : "" }}>
                    Разработка ПО
                </label>
            </div>
        </label>
        @error('direction')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror



        <div class="news">
            <label class="titleInputText news_label">
                Согласие на обработку персональных данных:
                <input type="checkbox" name="accept" id="" {{old('accept') ? 'checked' : ""}}>
            </label>
            @error('accept')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>


        <button class="bt" type="submit">Send</button>
    </form>
@endsection