<?php

    print '
    
        <h1>Kontakt</h1>
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2785.830523174023!2d16.071738415796606!3d45.71443667910462!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47667e543ebb2c65%3A0xe159703d90972cf3!2sVeleu%C4%8Dili%C5%A1te%20Velika%20Gorica!5e0!3m2!1shr!2shr!4v1672854538566!5m2!1shr!2shr" style="border:0;"></iframe>
            <form action="podatci.txt" method="post">
                
                <label for="ime">Ime</label>
                <input type="text" id="ime" name="ime" placeholder="Vaše ime.." required>
                <br>
                <label for="prezime">Prezime</label>
                <input type="text" id="prezime" name="prezime" placeholder="Vaše prezime.." required>
                <br>
                <label for="mail">E-mail</label>
                <input type="email" id="mail" name="mail" placeholder="Vaš E-mail.." required>
                <br>
                <label for="zemlja">Zemlja</label>
                <select id="zemlja" name="zemlja">
                    <option value="">Molimo odaberite zemlju</option>
                    <option value="DE">Njemačka</option>
                    <option value="HR">Hrvatska</option>
                    <option value="HUN">Mađarska</option>
                    <option value="SRB">Srbija</option>
                    <option value="BIH">Bosna i Hercegovina</option>
                    <option value="ITA">Italija</option>
                </select>
                <br>
                <label for="predmet">Predmet:</label>
                <br>
                <textarea name="predmet" id="predmet" placeholder="Napišite nešto..." style="height: 300px"></textarea>
                <input type="submit" value="Submit">
            </form>
    ';

?>