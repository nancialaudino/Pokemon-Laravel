@extends('app')
@section('title', 'Homepage')

@section('content')

    <main class="main">
        <div class="container">
            <div class="hero-section">
                <div class="hero-content">
                    <div class="hero-text">
                        <h1>Acheter Et Vendez Vos Cartes Pokémon En Toute Confiance</h1>
                        <div class="charizard-container">
                          <img class="charizard-logo" src="{{ asset('images/image3.png') }}" alt="pikachu">
                        </div>
                    </div>
                    <div class="phones-container">
                        <div class="phone phone-left">
                            <div class="phone-screen">
                                <div class="phone-header">
                                    <div class="status-bar">
                                        <span class="signal">●●●</span>
                                        <span class="time">9:41</span>
                                        <span class="battery">100%</span>
                                    </div>
                                </div>
                                <div class="app-content">
                                    <div class="card-detail">
                                        <div class="card-image">
                                            <div class="pokemon-card">
                                                <img class="phone-card" src="{{ asset('images/Dracauf.jpg') }}" alt="pikachu">
                                                <div class="price-badge">50€</div>
                                            </div>
                                        </div>
                                        <div class="card-details-form">
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input type="text" value="Dracaufeu">
                                            </div>
                                            <div class="form-group">
                                                <label>Rareté</label>
                                                <input type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Extension</label>
                                                <input type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Numéro</label>
                                                <input type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Carte alternative</label>
                                                <select>
                                                    <option>Oui</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="phone phone-right">
                            <div class="phone-screen">
                                <div class="phone-header">
                                    <div class="status-bar">
                                        <span class="signal">●●●</span>
                                        <span class="time">9:41</span>
                                        <span class="battery">100%</span>
                                    </div>
                                </div>
                                <div class="app-content">
                                    <div class="profile-section">
                                        <div class="profile-header">
                                            <div class="avatar"></div>
                                            <div class="profile-info">
                                                <h3>Alexandre MERCIER</h3>
                                                <p>Collectionneur professionnel</p>
                                            </div>
                                        </div>
                                        <div class="rating-section">
                                            <div class="rating-item">
                                                <span class="rating-label">Note moyenne</span>
                                                <span class="rating-value">4.9/5</span>
                                            </div>
                                            <div class="evaluations-btn">Évaluations</div>
                                        </div>
                                        <div class="transactions">
                                            <div class="transaction-item positive">
                                                <span class="transaction-type">Vente - TCG # 451</span>
                                                <span class="transaction-amount">+ 50€</span>
                                            </div>
                                            <div class="transaction-item negative">
                                                <span class="transaction-type">Achat - TCG # 451</span>
                                                <span class="transaction-amount">- 25€</span>
                                            </div>
                                            <div class="transaction-item positive">
                                                <span class="transaction-type">Vente - TCG # 451</span>
                                                <span class="transaction-amount">+ 100€</span>
                                            </div>
                                        </div>
                                        <div class="profile-actions">
                                            <button class="disconnect-btn">Se déconnecter</button>
                                            <button class="delete-account-btn">Supprimer le compte</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bottom-section">
                    <div class="">
                        <div class="phone phone-left">
                            <div class="phone-screen">
                                <div class="phone-header">
                                    <div class="status-bar">
                                        <span class="signal">●●●</span>
                                        <span class="time">9:41</span>
                                        <span class="battery">100%</span>
                                    </div>
                                </div>
                                <div class="app-content">
                                    <div class="card-detail">
                                        <div class="card-image">
                                            <div class="pokemon-card">
                                                <img class="phone-card" src="{{ asset('images/pik.jpg') }}" alt="pikachu">
                                            </div>
                                        </div>
                                        <div class="price-badge">50€</div>
                                        <div class="card-details-form">
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input type="text" value="Pikachu">
                                            </div>
                                            <div class="form-group">
                                                <label>Rareté</label>
                                                <input type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Extension</label>
                                                <input type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Numéro</label>
                                                <input type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Carte alternative</label>
                                                <select>
                                                    <option>Oui</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="services-info">
                        <h2>Nos Services Pensés Pour Les Vrais Collectionneurs</h2>
                        <h3>Achat & Vente Sécurisé</h3>
                        <p>Des Transactions En Toute Confiance</p>
                    </div>
                    <div class="charizard-container">
                          <img class="charizard-logo" src="{{ asset('images/image4.png') }}" alt="pikachu">
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection