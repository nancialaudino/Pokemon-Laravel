@extends('app')

@section('title', 'Catalogue')

@section('content')
    <main class="main">
        <div class="container">
            <h1 class="catalogue-title">Catalogue</h1>

            <div class="catalogue-grid">
                @foreach ($pokemons as $pokemon)
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset($pokemon->image) }}" alt="{{ $pokemon->nom_carte }}">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">{{ $pokemon->nom_carte }}</h3>
                            <div class="product-footer">
                                <span class="product-price">{{ $pokemon->price }}€</span>
                                <form action="{{ route('product.show', $pokemon->id_carte) }}" method="GET">
                                    <button type="submit" class="acheter-btn">Acheter</button>
                                </form>

                                {{--<button class="acheter-btn" onclick="window.location.href='{{ route('product.show', $pokemon->id_carte) }}'">Acheter</button> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection



{{--@extends('app')
@section('title', 'Catalogue')

@section('content')

    <main class="main">
        <div class="container">
            <h1 class="catalogue-title">Catalogue</h1>
            
            <div class="catalogue-grid">
                <!-- Primeira linha -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('images/Dracauf.jpg') }}" alt="Pokemon 1">
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Dracauf</h3>
                        <div class="product-footer">
                            <span class="product-price">50€</span>
                            <button class="acheter-btn">Acheter</button>
                        </div>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('images/pik.jpg') }}" alt="Pokemon 2">
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Pik</h3>
                        <div class="product-footer">
                            <span class="product-price">200€</span>
                            <button class="acheter-btn">Acheter</button>
                        </div>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('images/Salameche.jpg') }}" alt="Pokemon 3">
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Salameche</h3>
                        <div class="product-footer">
                            <span class="product-price">350€</span>
                            <button class="acheter-btn">Acheter</button>
                        </div>
                    </div>
                </div>

                <!-- Segunda linha -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('images/luxio.jpg') }}" alt="Pokemon 4">
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Luxio</h3>
                        <div class="product-footer">
                            <span class="product-price">80€</span>
                            <button class="acheter-btn">Acheter</button>
                        </div>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('images/Dracauf.jpg') }}" alt="Pokemon 5">
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Dracauf</h3>
                        <div class="product-footer">
                            <span class="product-price">250€</span>
                            <button class="acheter-btn">Acheter</button>
                        </div>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('images/Dracauf.jpg') }}" alt="Pokemon 6">
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Dracauf</h3>
                        <div class="product-footer">
                            <span class="product-price">55€</span>
                            <button class="acheter-btn">Acheter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

--}}