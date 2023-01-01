@role('admin')
<li>
    <a class="nav-link" href="{{ route('home') }}">{{ __('Dashboard') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('kategori') }}">{{ __('Rubik') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('subkategori') }}">{{ __('Kategori') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('user') }}">{{ __('User') }}</a>
</li>
@endrole

@role('redaktur')
<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">{{ __('Dashboard') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('publish') }}">{{ __('Publish') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('myartikel') }}">{{ __('My Artikel') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('video') }}">{{ __('Video') }}</a>
</li>

<li class="nav-item dropdown">
    <a class="nav-link dropdown " href="#" id="dropdownId" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">{{ __('My Poin') }}</a>
    <div class="dropdown-menu" aria-labelledby="dropdownId">
    <a class="dropdown-item " href="{{ route('mypoint.redaktur') }}">{{ __('My Poin') }}</a>
    <a class="dropdown-item " href="{{ route('nominal') }}">{{ __('Nominal Poin') }}</a>
    <a class="dropdown-item " href="{{ route('publish') }}">{{ __('Tukar Poin') }}</a>
    </div>
</li>
@endrole

@role('jurnalis')
<li class="nav-item">
    <a class="nav-link" href="{{ route('leaderboard') }}">{{ __('Leaderboard') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">{{ __('Dashboard') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('publish.jurnalis') }}">{{ __('Publish') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('artikelredaktur.add') }}">{{ __('Add Artikel') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('mypoint.jurnalis') }}">{{ __('My Poin') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('mynotif.jurnalis') }}">{{ __('Notifikasi') }}</a>
</li>
@endrole

{{-- <li class="nav-item">
    <a class="nav-link" href="{{ route('change') }}">{{ __('Ubah Pass') }}</a>
</li> --}}
