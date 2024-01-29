<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BTC rate calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            display: none;
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance:textfield;
        }
    </style>
</head>

<body class="h-100 d-flex align-items-center text-center">
    <div class="container" style="max-width: 300px">
        <form class="row g-3" action="{{ route('web.convert') }}">
            <h3>Convert your currency to BTC {{session('btcValue')}}</h3>
            <div>
                <input
                    autofocus
                    class="form-control  @error('amount') is-invalid @enderror"
                    type="number"
                    step="any"
                    min="0"
                    inputmode="decimal"
                    autocomplete="off"
                    name="amount"
                    placeholder="Amount"
                    onkeydown="return event.keyCode !== 69"  {{-- Cancel 'e' --}}
                    value={{ old('amount') }}
                >
            </div>
            <div>
                <select class="form-select @error('coin') is-invalid @enderror" name="coin" required>
                    <option value="" disabled selected hidden>Currency</option>
                    @foreach($currencies as $curr)
                        <option
                            value="{{ $curr->code }}"
                            @selected(old('coin') == $curr->code)
                        >
                            {{ $curr->code }} - {{ $curr }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <button class="btn btn-primary">Convert to BTC</button>
            </div>
        </form>
        @isset($btcValue)
            <div class="mt-3 alert alert-success">
                <h3>{{ old('amount') }} {{ old('coin') }}
                <br>=<br>
                {{ $btcValue }} BTC</h3>
            </div>
        @endisset
        @foreach($errors->all() as $error)
            <div class="mt-3 alert alert-danger">
                <h5>{{ $error }}</h3>
            </div>
        @endforeach
    </div>
</body>

</html>
