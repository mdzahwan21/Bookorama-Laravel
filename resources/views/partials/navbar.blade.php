<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a id="logo" class="navbar-brand custom-navbar-brand" href="https://www.gramedia.com" target="_blank">Bookorama</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ $page_title == 'Home' ? 'active' : '' }}">
                <a class="nav-link" href="/" >Home</a>
            </li>
            <li class="nav-item {{ $page_title == 'About' ? 'active' : '' }}">
                <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item {{ $page_title == 'Book List' ? 'active' : '' }}">
                <a class="nav-link" href="/books">Book List</a>
            </li>
        </ul>
    </div>
</nav>
<style>
    #logo {
        border: 3px solid black;
        border-radius: 10px;
        background-color: pink;
        padding: 10px;
    }
</style>