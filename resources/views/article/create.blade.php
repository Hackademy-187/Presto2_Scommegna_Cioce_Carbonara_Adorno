<x-layout>
    <div style="background: linear-gradient(135deg, #1c483c 0%, #1a3028 100%); min-height: 100vh; padding-bottom: 60px;">
        
        <div class="container" style="padding-top: 100px;"> <!-- Spazio generoso dalla navbar fissa -->
            
            <!-- HEADER -->
            <div class="row justify-content-center text-center mb-4">
                <div class="col-12 col-md-8">
                    <span class="section-label d-block text-uppercase" style="letter-spacing: 2px; color: #d4a843; font-size: 14px; font-weight: 600;">
                        Nuovo Annuncio
                    </span>
                    <h1 class="fw-bold mt-2" style="color: #fff; font-family: 'Poppins', sans-serif; font-size: 42px;">
                        Pubblica un annuncio
                    </h1>
                    <div class="mx-auto mt-3" style="width: 60px; height: 3px; background-color: #d4a843;"></div>
                </div>
            </div>

            <!-- FORM LIVEWIRE -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-7"> <!-- Larghezza bilanciata per un form leggibile -->
                    <livewire:create-article-form />
                </div>
            </div>

        </div>

    </div>
</x-layout>