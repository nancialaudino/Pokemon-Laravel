@extends('app')
@section('title', 'Add')

@section('content')
<div>
    <h1 class="catalogue-title">Ajouter une carte </h1>
</div>

<div class="container">
        <form action="{{ route('pokemons.add') }}" method="POST">
            @csrf <!-- Proteção contra CSRF -->
             <div class="row">
                <div class="col-25">
                    <label for="nom_carte" class="product-name">Nom:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="nom_carte" required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="type_carte" class="product-name">Type:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="type_carte" required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="generation" class="product-name">Generation:</label>
                </div>
                <div class="col-75">
                    <select id="generation" name="generation">
                        <option name="generation1">1</option>
                        <option name="generation2">2</option>
                        <option name="generation3">3</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">

                    <label for="price" class="product-name">Prix:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="price" required>
                </div>
                </div>
            <div class="row">
                <div class="col-25">

                    <label for="image" class="product-name">Image:</label>

                </div>
                <div class="col-75">
                    <input type="text" name="image" required>
                </div>
                </div>
            <div class="row">
                <div class="col-25">
                    <label for="description" class="product-name">Description:</label>
                </div>
                <div class="col-75">
                    <textarea name="description" required></textarea>
                </div>
            </div>
            <div class="row">
                    {{--<button type="submit" class="acheter-btn">Créer</button>--}}
                    <input type="submit" value="Créer" class="acheter-btn">
            </div>
        </form>
</div>

@endsection






{{--

<div class="container">
    <div class="admin-section">
        <h1 class="admin-title">Panneau d'Administration</h1>
        
        <!-- Formulaire d'ajout de carte -->
        <div class="admin-form-container">
            <h2 class="form-title">Ajouter une nouvelle carte</h2>
            <form class="admin-form" action="{{ route('cartes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label for="id_carte">ID Carte</label>
                        <input type="text" id="id_carte" name="id_carte" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="nom_carte">Nom de la Carte</label>
                        <input type="text" id="nom_carte" name="nom_carte" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="type_carte">Type de Carte</label>
                        <select id="type_carte" name="type_carte" required>
                            <option value="">Sélectionner un type</option>
                            <option value="feu">Feu</option>
                            <option value="eau">Eau</option>
                            <option value="plante">Plante</option>
                            <option value="electrique">Électrique</option>
                            <option value="psy">Psy</option>
                            <option value="combat">Combat</option>
                            <option value="obscurite">Obscurité</option>
                            <option value="metal">Métal</option>
                            <option value="dragon">Dragon</option>
                            <option value="fee">Fée</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="generation">Génération</label>
                        <select id="generation" name="generation" required>
                            <option value="">Sélectionner une génération</option>
                            <option value="1">Génération I</option>
                            <option value="2">Génération II</option>
                            <option value="3">Génération III</option>
                            <option value="4">Génération IV</option>
                            <option value="5">Génération V</option>
                            <option value="6">Génération VI</option>
                            <option value="7">Génération VII</option>
                            <option value="8">Génération VIII</option>
                            <option value="9">Génération IX</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="prix">Prix (€)</label>
                        <input type="number" id="prix" name="prix" step="0.01" min="0" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="image">Image de la Carte</label>
                        <input type="file" id="image" name="image" accept="image/*" required>
                    </div>
                </div>
                
                <div class="form-group full-width">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" placeholder="Décrivez la carte..."></textarea>
                </div>
                
                <button type="submit" class="submit-btn">Ajouter la Carte</button>
            </form>
        </div>

        <!-- Formulaire de mise à jour de carte -->
        <div class="admin-form-container">
            <h2 class="form-title">Mettre à jour une carte existante</h2>
            <form class="admin-form" action="{{ route('cartes.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="search-section">
                    <div class="form-group">
                        <label for="search_id">Rechercher par ID</label>
                        <input type="text" id="search_id" name="search_id" placeholder="Entrez l'ID de la carte à modifier">
                        <button type="button" class="search-btn" onclick="searchCard()">Rechercher</button>
                    </div>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="update_id_carte">ID Carte</label>
                        <input type="text" id="update_id_carte" name="id_carte" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label for="update_nom_carte">Nom de la Carte</label>
                        <input type="text" id="update_nom_carte" name="nom_carte">
                    </div>
                    
                    <div class="form-group">
                        <label for="update_type_carte">Type de Carte</label>
                        <select id="update_type_carte" name="type_carte">
                            <option value="">Sélectionner un type</option>
                            <option value="feu">Feu</option>
                            <option value="eau">Eau</option>
                            <option value="plante">Plante</option>
                            <option value="electrique">Électrique</option>
                            <option value="psy">Psy</option>
                            <option value="combat">Combat</option>
                            <option value="obscurite">Obscurité</option>
                            <option value="metal">Métal</option>
                            <option value="dragon">Dragon</option>
                            <option value="fee">Fée</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="update_generation">Génération</label>
                        <select id="update_generation" name="generation">
                            <option value="">Sélectionner une génération</option>
                            <option value="1">Génération I</option>
                            <option value="2">Génération II</option>
                            <option value="3">Génération III</option>
                            <option value="4">Génération IV</option>
                            <option value="5">Génération V</option>
                            <option value="6">Génération VI</option>
                            <option value="7">Génération VII</option>
                            <option value="8">Génération VIII</option>
                            <option value="9">Génération IX</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="update_prix">Prix (€)</label>
                        <input type="number" id="update_prix" name="prix" step="0.01" min="0">
                    </div>
                    
                    <div class="form-group">
                        <label for="update_image">Nouvelle Image (optionnel)</label>
                        <input type="file" id="update_image" name="image" accept="image/*">
                        <small>Laissez vide pour conserver l'image actuelle</small>
                    </div>
                </div>
                
                <div class="form-group full-width">
                    <label for="update_description">Description</label>
                    <textarea id="update_description" name="description" rows="4" placeholder="Décrivez la carte..."></textarea>
                </div>
                
                <div class="button-group">
                    <button type="submit" class="submit-btn update">Mettre à Jour</button>
                    <button type="button" class="delete-btn" onclick="deleteCard()">Supprimer la Carte</button>
                </div>
            </form>
        </div>
    </div>
</div>



<style>
.admin-section {
    max-width: 1000px;
    margin: 0 auto;
    padding: 40px 20px;
}

.admin-title {
    font-size: 36px;
    font-weight: bold;
    color: #333;
    text-align: center;
    margin-bottom: 50px;
    background: linear-gradient(135deg, #d85a5a 0%, #c44545 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.admin-form-container {
    background: white;
    border-radius: 15px;
    padding: 30px;
    margin-bottom: 40px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    border: 1px solid #e8e8e8;
}

.form-title {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 25px;
    padding-bottom: 10px;
    border-bottom: 2px solid #d85a5a;
}

.admin-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-group label {
    font-size: 14px;
    font-weight: 600;
    color: #555;
    margin-bottom: 5px;
}

.form-group input,
.form-group select,
.form-group textarea {
    padding: 12px 15px;
    border: 2px solid #e1e1e1;
    border-radius: 8px;
    font-size: 14px;
    transition: all 0.3s ease;
    background: white;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #d85a5a;
    box-shadow: 0 0 0 3px rgba(216, 90, 90, 0.1);
}

.form-group textarea {
    resize: vertical;
    min-height: 100px;
}

.form-group small {
    font-size: 12px;
    color: #666;
    margin-top: 5px;
}

.search-section {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.search-btn {
    background: #6c757d;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-left: 10px;
}

.search-btn:hover {
    background: #5a6268;
    transform: translateY(-2px);
}

.submit-btn {
    background: linear-gradient(135deg, #d85a5a 0%, #c44545 100%);
    color: white;
    border: none;
    padding: 15px 30px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    align-self: flex-start;
}

.submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 15px rgba(216, 90, 90, 0.3);
}

.submit-btn.update {
    background: linear-gradient(135deg, #28a745 0%, #20923a 100%);
}

.submit-btn.update:hover {
    box-shadow: 0 8px 15px rgba(40, 167, 69, 0.3);
}

.button-group {
    display: flex;
    gap: 15px;
    align-items: center;
}

.delete-btn {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    color: white;
    border: none;
    padding: 15px 30px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.delete-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 15px rgba(220, 53, 69, 0.3);
}

@media (max-width: 768px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
    
    .admin-title {{{--
        font-size: 28px;
    }
    
    .admin-form-container {
        padding: 20px;
    }
    
    .button-group {
        flex-direction: column;
        align-items: stretch;
    }
    
    .submit-btn,
    .delete-btn {
        width: 100%;
        text-align: center;
    }
}
</style>

<script>
function searchCard() {
    const searchId = document.getElementById('search_id').value;
    
    if (!searchId) {
        alert('Veuillez entrer un ID à rechercher');
        return;
    }
    
    // Ici vous pouvez faire un appel AJAX pour récupérer les données de la carte
    // Pour l'exemple, je simule des données
    
    fetch(`/admin/search-card/${searchId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('update_id_carte').value = data.carte.id_carte;
                document.getElementById('update_nom_carte').value = data.carte.nom_carte;
                document.getElementById('update_type_carte').value = data.carte.type_carte;
                document.getElementById('update_generation').value = data.carte.generation;
                document.getElementById('update_prix').value = data.carte.prix;
                document.getElementById('update_description').value = data.carte.description;
            } else {
                alert('Carte non trouvée');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            alert('Erreur lors de la recherche');
        });
}

function deleteCard() {
    const cardId = document.getElementById('update_id_carte').value;
    
    if (!cardId) {
        alert('Veuillez d\'abord rechercher une carte');
        return;
    }
    
    if (confirm('Êtes-vous sûr de vouloir supprimer cette carte? Cette action est irréversible.')) {
        fetch(`/admin/delete-card/${cardId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Carte supprimée avec succès');
                // Réinitialiser le formulaire
                document.querySelector('.admin-form').reset();
            } else {
                alert('Erreur lors de la suppression');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            alert('Erreur lors de la suppression');
        });
    }
}
</script>
@endsection

--}}