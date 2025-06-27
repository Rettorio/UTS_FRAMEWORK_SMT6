@extends('layouts.dashboard')

@section('title', 'Wisata - tambah')

@section('stylecss')
<style>
    .imgPreview {
        max-width: 250px;
        max-height: 200px;
        margin-right: 1rem;
        display: none;
    }
</style>
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            @if (session('success'))
                <div class="alert alert-primary mb-2" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger mb-2" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>
                                {{$error}}
                        </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <nav aria-label="breadcrumb mb-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Wisata</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah data</li>
                </ol>
            </nav>
            <h3 class="font-weight-bold">Tambah Wisata Baru</h3>
        </div>

            <div class="col-12 grid-margin mt-3 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Form Wisata</h4>
                    <p class="card-description">form dengan label <span>*</span> wajib diisi</p>
                    <form class="forms-sample" method="POST" action="{{ route('admin.wisata.store') }}" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">*Nama Tempat</label>
                        <input type="text" name="nama_tempat" value="{{ old('nama') }}" class="form-control" id="exampleInputName1" placeholder="Name" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">*Lokasi</label>
                        <input type="text" name="lokasi" value="{{ old('lokasi') }}" class="form-control" id="exampleInputEmail3" placeholder="Lokasi" required>
                      </div>
                      <div class="form-group">
                            <label for="ticketPrice">*Harga Tiket Masuk</label>
                            <input name="harga_tiket" value="{{ old('harga_tiket') }}" type="text" id="ticketPrice" class="form-control" value="50000" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">*Fasilitas</label>
                        <textarea type="text" name="fasilitas" row="3" class="form-control" id="exampleInputPassword4" placeholder="*WC UMUM dll">{{ old('fasilitas') }}</textarea>
                      </div>
                      <div class="form-group">
                        <label>*Banner Utama</label>
                        <input type="file" name="banner1" onchange="previewImage(this,'preview1')" accept="image/png,image/jpeg" id="bnner1" class="form-control">
                        <span class="mt-2 text-primary" style="font-size: 12px;">maksimal ukuran 2mb</span>
                      </div>
                        <div class="form-group">
                        <label>Banner kedua</label>
                        <input type="file" onchange="previewImage(this,'preview2')" name="banner2" accept="image/png,image/jpeg" id="bnner2"  class="form-control">
                        <span class="mt-2 text-primary" style="font-size: 12px;">maksimal ukuran 2mb</span>
                      </div>
                        <div class="form-group">
                        <label>Banner ketiga</label>
                        <input type="file" name="banner3" onchange="previewImage(this,'preview3')" id="bnner3" accept="image/png,image/jpeg" class="form-control">
                        <span class="mt-2 text-primary" style="font-size: 12px;">maksimal ukuran 2mb</span>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Deskripsi menarik</label>
                        <textarea name="deskripsi" class="form-control" id="exampleTextarea1" rows="4">{{ old('deskripsi') }}</textarea>
                      </div>
                      <button type="submit" id="submitButton" class="btn btn-primary me-2">Simpan</button>
                      <button class="btn btn-light" type="reset">Reset</button>
                    </form>
                    <div class="mt-3">
                        <h5>Preview disini</h5>
                        <div class="d-flex">
                            
                            <img id="preview1" class="imgPreview" />
                            <img id="preview2" class="imgPreview" />
                            <img id="preview3" class="imgPreview" />
                        </div>
                    </div>
                  </div>
                </div>
              </div>
    </div>
@endsection
@section('js')
    <script>
        // munculkan gambar
        function previewImage(i,imgId) {
            // Untuk mengambil data gambar
            const imgPreview = document.getElementById(imgId);
            const oFReader = new FileReader();
            oFReader.readAsDataURL(i.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
            imgPreview.style.display = 'block';
        }
                /**
         * Mutates an input field's value into a currency format (Rp X,XXX)
         * and ensures only unsigned numbers are allowed.
         *
         * @param {HTMLInputElement} inputElement The input DOM element to apply the formatting to.
         */
        function formatCurrencyInput(inputElement) {
            if (!inputElement || !(inputElement instanceof HTMLInputElement)) {
                console.error("Invalid input element provided to formatCurrencyInput.");
                return;
            }

            // Use Intl.NumberFormat for robust currency formatting
            const currencyFormatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0, // No decimals for currency
                maximumFractionDigits: 0  // No decimals for currency
            });

            /**
             * Cleans the input value to only contain digits, then formats it as currency.
             * @param {string} value The current value from the input field.
             * @returns {string} The cleaned and formatted string.
             */
            function cleanAndFormat(value) {
                // 1. Remove all non-digit characters
                // This handles cases like copy-pasting "Rp 120,000" or "123abc456"
                const cleanedValue = value.replace(/\D/g, '');

                // 2. Convert to a number. Handle empty string case.
                let numberValue = parseInt(cleanedValue, 10);

                // If it's not a valid number (e.g., empty string after cleaning), return empty string
                if (isNaN(numberValue) || cleanedValue === '') {
                    return '';
                }

                // 3. Format as currency
                return currencyFormatter.format(numberValue);
            }

            // Attach the input event listener
            inputElement.addEventListener('input', (event) => {
                const input = event.target;
                const originalValue = input.value;
                const selectionStart = input.selectionStart;
                const selectionEnd = input.selectionEnd;

                // Get the cleaned and formatted value
                const formattedValue = cleanAndFormat(originalValue);

                // Update the input field's value
                input.value = formattedValue;
                const diff = formattedValue.length - originalValue.length;
                if (selectionStart !== null) {
                    input.setSelectionRange(selectionStart + diff, selectionEnd + diff);
                }
            });

            // Also format the initial value in case the input field is pre-filled
            inputElement.value = cleanAndFormat(inputElement.value);
            inputElement.getRawValue = function() {
                return parseInt(this.value.replace(/\D/g, ''), 10) || 0; // Return 0 if empty
            };
        }

        // --- How to use it ---

        // 1. Get your input element
        const ticketPriceInput = document.getElementById('ticketPrice');

        // 2. Apply the formatting function
        if (ticketPriceInput) {
            formatCurrencyInput(ticketPriceInput);
        }

        // --- Example of how to retrieve the raw value for submission or calculations ---
        // (e.g., when a form is submitted or a button is clicked)
        document.getElementById('submitButton')?.addEventListener('click', () => {
            if (ticketPriceInput) {
                const rawPrice = ticketPriceInput.getRawValue();
                ticketPriceInput.value = rawPrice;
                console.log("Raw price for submission:", rawPrice);
            }
        });
    </script>
@endsection