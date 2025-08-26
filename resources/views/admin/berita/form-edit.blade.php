@extends('layouts.main')
@section('title', 'Edit Berita')

@section('main')

    <style>
        :root {
            --primary-blue: #1e3a8a;
            --secondary-blue: #3b82f6;
            --accent-blue: #60a5fa;
            --light-gray: #f8fafc;
            --dark-gray: #64748b;
        }

        .modern-page-header {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 20px rgba(30, 58, 138, 0.15);
        }

        .modern-page-header h3 {
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .modern-page-header .text-subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
        }

        .modern-breadcrumb {
            background: rgba(255, 255, 255, 0.1);
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            backdrop-filter: blur(10px);
        }

        .modern-breadcrumb .breadcrumb {
            margin: 0;
        }

        .modern-breadcrumb .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .modern-breadcrumb .breadcrumb-item a:hover {
            color: white;
        }

        .modern-breadcrumb .breadcrumb-item.active {
            color: rgba(255, 255, 255, 0.7);
        }

        .modern-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .modern-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .modern-card-header {
            background: var(--light-gray);
            border-bottom: 3px solid var(--primary-blue);
            padding: 1.5rem 2rem;
        }

        .modern-card-header h4 {
            color: var(--primary-blue);
            font-weight: 600;
            font-size: 1.5rem;
            margin: 0;
        }

        .modern-btn-back {
            background: var(--primary-blue);
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .modern-btn-back:hover {
            background: var(--secondary-blue);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 58, 138, 0.3);
            color: white;
        }

        .modern-card-body {
            padding: 2.5rem;
            background: white;
        }

        .modern-form-group {
            margin-bottom: 2rem;
            position: relative;
        }

        .modern-form-label {
            font-weight: 600;
            color: var(--primary-blue);
            margin-bottom: 0.75rem;
            font-size: 1.1rem;
            display: block;
        }

        .modern-form-control {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            width: 100%;
        }

        .modern-form-control:focus {
            border-color: var(--secondary-blue);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
            transform: translateY(-1px);
        }

        .modern-form-control:hover {
            border-color: var(--accent-blue);
        }

        .modern-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 1rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 3rem;
        }

        .modern-file-input {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .modern-file-input input[type=file] {
            position: absolute;
            left: -9999px;
        }

        .modern-file-label {
            border: 2px dashed var(--accent-blue);
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: rgba(96, 165, 250, 0.05);
            display: block;
        }

        .modern-file-label:hover {
            border-color: var(--secondary-blue);
            background: rgba(96, 165, 250, 0.1);
        }

        .modern-file-icon {
            font-size: 2rem;
            color: var(--accent-blue);
            margin-bottom: 0.5rem;
        }

        .modern-btn-submit {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            border: none;
            padding: 1rem 3rem;
            border-radius: 50px;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(30, 58, 138, 0.3);
        }

        .modern-btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(30, 58, 138, 0.4);
        }

        .modern-btn-submit:active {
            transform: translateY(-1px);
        }

        .error-message {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: block;
        }

        .form-floating-effect {
            position: relative;
        }

        .form-floating-effect input:focus+.floating-label,
        .form-floating-effect input:not(:placeholder-shown)+.floating-label {
            transform: translateY(-1.5rem) scale(0.85);
            color: var(--secondary-blue);
        }

        .floating-label {
            position: absolute;
            top: 1rem;
            left: 1.25rem;
            color: var(--dark-gray);
            transition: all 0.3s ease;
            pointer-events: none;
            background: white;
            padding: 0 0.5rem;
        }

        .old-image-preview {
            border: 2px solid var(--accent-blue);
            border-radius: 12px;
            padding: 1rem;
            background: rgba(96, 165, 250, 0.05);
            margin-bottom: 1rem;
        }

        .old-image-preview img {
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .modern-page-header {
                padding: 1.5rem 0;
            }

            .modern-card-body {
                padding: 1.5rem;
            }

            .modern-breadcrumb {
                margin-top: 1rem;
            }
        }
    </style>

    <div class="modern-page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h3 class="text-white"><i class="fa fa-edit text-white me-1"></i> Form Edit Berita</h3>
                    <p class="text-subtitle">Edit dan perbarui konten berita yang sudah ada</p>
                </div>
                <div class="col-12 col-md-6">
                    <nav aria-label="breadcrumb" class="float-start float-lg-end">
                        <div class="modern-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ Route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item">Berita</li>
                                <li class="breadcrumb-item active" aria-current="page">Form-edit</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-12">
                    <div class="card modern-card">
                        <div class="card-header modern-card-header mb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title"><i class="fa fa-edit"></i> Form Edit Berita</h4>
                                <a href="{{ Route('berita.index') }}" class="modern-btn-back">
                                    ← Kembali
                                </a>
                            </div>
                        </div>

                        <div class="card-body modern-card-body">
                            <form action="{{ Route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" id="newsForm">
                                @csrf
                                @method('PUT')

                                <div class="modern-form-group">
                                    <label for="judul" class="modern-form-label"><i class="fa fa-newspaper"></i> Judul Berita</label>
                                    <div class="form-floating-effect">
                                        <input type="text" name="judul" value="{{ $berita->judul }}" class="form-control modern-form-control" id="judul" placeholder=" " required />
                                        {{-- <label for="judul" class="floating-label">Masukkan judul berita yang menarik...</label> --}}
                                    </div>
                                    @error('judul')
                                        <small class="error-message">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="modern-form-group">
                                    <label for="kategori" class="modern-form-label"><i class="fa fa-tags"></i> Kategori</label>
                                    <select name="id_category" id="kategori" class="form-select modern-form-control modern-select" required>
                                        <option value="" disabled>- Pilih kategori berita -</option>
                                        @foreach ($kategori as $item)
                                            <option {{ $item->id == $berita->id_category ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_category')
                                        <small class="error-message">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="modern-form-group">
                                    <label for="konten" class="modern-form-label"><i class="fa fa-pen-to-square"></i> Konten Berita</label>
                                    <textarea name="konten" class="form-control modern-form-control" id="konten" rows="6" placeholder="Tulis konten berita yang informatif dan menarik..." required>{{ $berita->konten }}</textarea>
                                    @error('konten')
                                        <small class="error-message">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="modern-form-group">
                                    <label class="modern-form-label"><i class="fa fa-images"></i> Gambar Berita</label>

                                    <!-- Added old image preview section -->
                                    <div class="old-image-preview">
                                        <label class="modern-form-label" style="margin-bottom: 0.5rem; font-size: 1rem;"><i class="fa fa-image"></i> Gambar Saat Ini</label>
                                        <img src="{{ asset('uploads/berita/' . $berita->gambar) }}" class="img-fluid" style="width: 30%; max-width: 300px;" alt="{{ $berita->gambar }}">
                                    </div>

                                    <div class="modern-file-input">
                                        <input type="file" name="gambar" id="gambar" accept="image/*" />
                                        <label for="gambar" class="modern-file-label" id="fileLabel">
                                            <div class="modern-file-icon"><i class="fa fa-image"></i></div>
                                            <div><strong>Klik untuk upload gambar baru</strong></div>
                                            <div style="color: var(--dark-gray); margin-top: 0.5rem;">atau drag & drop file di sini</div>
                                            <div style="font-size: 0.875rem; color: var(--dark-gray); margin-top: 0.5rem;">Format: JPG, PNG, GIF (Max: 2MB)</div>
                                            <div style="font-size: 0.875rem; color: var(--accent-blue); margin-top: 0.25rem;">Kosongkan jika tidak ingin mengganti gambar</div>
                                        </label>
                                    </div>
                                    @error('gambar')
                                        <small class="error-message">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" class="modern-btn-submit">
                                        <i class="fa fa-save"></i> Update Berita
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // File upload enhancement
            const fileInput = document.getElementById('gambar');
            const fileLabel = document.getElementById('fileLabel');

            fileInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    fileLabel.innerHTML = `
                <div class="modern-file-icon">✅</div>
                <div><strong>${file.name}</strong></div>
                <div style="color: var(--dark-gray); margin-top: 0.5rem;">File berhasil dipilih</div>
                <div style="font-size: 0.875rem; color: var(--dark-gray); margin-top: 0.5rem;">Klik lagi untuk mengganti file</div>
            `;
                    fileLabel.style.borderColor = 'var(--secondary-blue)';
                    fileLabel.style.background = 'rgba(59, 130, 246, 0.1)';
                }
            });

            // Drag and drop functionality
            fileLabel.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.style.borderColor = 'var(--secondary-blue)';
                this.style.background = 'rgba(59, 130, 246, 0.1)';
            });

            fileLabel.addEventListener('dragleave', function(e) {
                e.preventDefault();
                this.style.borderColor = 'var(--accent-blue)';
                this.style.background = 'rgba(96, 165, 250, 0.05)';
            });

            fileLabel.addEventListener('drop', function(e) {
                e.preventDefault();
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    fileInput.files = files;
                    fileInput.dispatchEvent(new Event('change'));
                }
            });

            // Form validation enhancement
            const form = document.getElementById('newsForm');
            form.addEventListener('submit', function(e) {
                const submitBtn = form.querySelector('.modern-btn-submit');
                submitBtn.innerHTML = '⏳ Mengupdate...';
                submitBtn.disabled = true;
            });

            // Auto-resize textarea
            const textarea = document.getElementById('konten');
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = this.scrollHeight + 'px';
            });

            // Character counter for title
            const judulInput = document.getElementById('judul');
            judulInput.addEventListener('input', function() {
                const maxLength = 100;
                const currentLength = this.value.length;

                // Remove existing counter
                const existingCounter = this.parentNode.querySelector('.char-counter');
                if (existingCounter) {
                    existingCounter.remove();
                }

                // Add new counter
                if (currentLength > 0) {
                    const counter = document.createElement('div');
                    counter.className = 'char-counter';
                    counter.style.cssText = 'font-size: 0.75rem; color: var(--dark-gray); margin-top: 0.25rem; text-align: right;';
                    counter.textContent = `${currentLength}/${maxLength} karakter`;

                    if (currentLength > maxLength * 0.8) {
                        counter.style.color = '#dc2626';
                    }

                    this.parentNode.appendChild(counter);
                }
            });
        });
    </script>

@endsection
