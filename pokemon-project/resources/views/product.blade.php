@extends('app')
@section('title', 'Product Detail')

@section('content')

    <main class="main">
        <div class="container-product">
            <div class="product-section">
                <div class="product-content">
                    <!-- Coluna da esquerda - Produto -->
                    <div class="product-left">
                        <div class="product-text">
                            <h1>Dracauf</h1>
                            <div class="charizard-container">
                              <img class="product-photo" src="{{ asset('images/Dracauf.jpg') }}" alt="pikachu">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Coluna da direita - Descrição do produto -->
                    <div class="product-right">
                        <div class="product-info">
                            <div class="product-details">
                                <h1> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor.</h1>
                            </div>
                               <div class="button-container">
                                <span class="price">50€</span>
                                <button class="button-valider panier">Ajouter au panier</button>       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection