@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@elseif (session('success'))
    <div class="alert alert-success" id="success-message">
        {{ session('success') }}
    </div>
@endif
<div class="card mx-3 mb-3">
    <div class="card-header pb-3">
        <h6 class="m-0">Tambah Kandidat Wakil Presiden</h6>
        <p class="m-0">Tambah Kandidat Wakil Presiden</p>
    </div>
    <div class="card-body pt-0">
        <form action="{{ route('vice-president-candidate.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="vice_president_candidate_id" class="form-label">Nama</label>
                <select id="vice_president_candidate_id" name="vice_president_candidate_id" class="form-select" required>
                    @foreach ($vicePresidentCandidates as $candidate)
                    <option value="{{ $candidate->id }}">{{ $candidate->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="biography" class="form-label">Biography</label>
                <input type="text" id="biography" name="biography" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="faculty" class="form-label">Fakultas</label>
                <input type="text" id="faculty" name="faculty" class="form-control" readonly>
            </div>  
            <div class="row mt-3">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="{{ route('vice-president-candidate.index') }}" class="btn bg-gradient-info">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectCandidate = document.getElementById('president_candidate_id');
        const inputFaculty = document.getElementById('faculty');

        function setInitialFaculty() {
            const selectedOption = selectCandidate.options[selectCandidate.selectedIndex];
            const faculty = selectedOption.getAttribute('data-faculty');

            inputFaculty.value = faculty;
        }

        setInitialFaculty();

        selectCandidate.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const faculty = selectedOption.getAttribute('data-faculty');

            inputFaculty.value = faculty;
        });
    });
</script>
@endsection
