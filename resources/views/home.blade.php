@extends('layouts.main')

@section('container')
<div style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;">
    <h1 id="typing-heading" style="color: black;"></h1>
</div>

<script>
    const headings = ["Bookorama", "oleh", "Kelompok 7"];
    const headingElement = document.getElementById('typing-heading');
    let index = 0;
    let textIndex = 0;

    function typeText() {
        if (textIndex < headings.length) {
            const currentText = headings[textIndex];
            if (index < currentText.length) {
                headingElement.innerHTML += currentText.charAt(index);
                index++;
                setTimeout(typeText, 100);
            } else {
                setTimeout(eraseText, 1000);
            }
        } else {
            textIndex = 0;
            setTimeout(typeText, 1000);
        }
    }

    function eraseText() {
        if (index > 0) {
            const currentText = headings[textIndex];
            headingElement.innerHTML = currentText.substring(0, index - 1);
            index--;
            setTimeout(eraseText, 50);
        } else {
            textIndex++;
            setTimeout(typeText, 500);
        }
    }


    window.addEventListener('load', () => {
        typeText();
    });
</script>
@endsection