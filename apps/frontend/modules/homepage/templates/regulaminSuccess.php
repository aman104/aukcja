<h4><?php echo __('Regulamin'); ?></h4>
<?php if($sf_user->getCulture() == 'pl'): ?>
<br />
<p>
1. W licytowaniu gołębi mogą wziąć udział tylko osoby wcześniej zarejestrowane (można to
uczynić w zakładce rejestracja).
<br /><br />
2. Podczas licytacji widoczny jest tylko nick osoby zarejestrowanej w serwisie oraz jej kraj
pochodzenia. Wszelkie inne dane są zastrzeżone.
<br /><br />
3. Po zakończeniu aukcji kupujący dostaje numer konta na, który powinna uiścić wpłatę za
wylicytowane gołębie
<br /><br />
4. Osoba licytująca zobowiązuje się kupić gołębia, a wystawca sprzedać za wylicytowaną
kwotę. W przypadku gdyby kupujący odstąpili od sfinalizowania transakcji, osoba ta
zostanie usunięta z grona użytkowników i i nie będą mogli uczestniczyć w innych aukcjach
organizowanych przez naszą stronę aukcyjną .
<br /><br />
5. Koszty dostarczenia gołębia pokrywa kupujący po ustaleniu zasad ze sprzedającym
<br /><br />
6. Jeżeli oferta zakupu gołębia zostaje złożona w ostatnich 15 minutach do zakończenia
aukcji, to termin zakończenia aukcji zostaje przedłużony automatycznie o kolejne 15 minut.
<br /><br />
7. W przypadku jeżeli transakcja nie zostanie sfinalizowana- kupujący nie zapłaci za gołębia, osoba ta zostanie usunięta z listy użytkowników giełdy i jego dane zostaną opublikowane celem ostrzeżenia potencjalnych innych klientów. 
<br /><br />
8. W nawiązaniu do punktu 7, użytkownik licytujący, który nie zapłaci za wylicytowanego
gołębia, zobowiązany jest do zapłaty 30% od wylicytowanej kwoty na pokrycie kosztów
wystawienia aukcji oraz strat materialnych poniesionych przez wystawiającego. W razie
braku wpłaty sprawa zostanie przekazana do odpowiednich organów ścigania celem
odzyskania pieniędzy (prokuratura)
<br /><br />
9.Aukcję wygrywa osoba, która złożyła najwyższą ofertę lub w razie tej samej kwoty danej przez 2 użytkowników wygrywa ten, który jako pierwszy złożył ofertę.
<br /><br />
<strong>10. E-mail aktywacyjny oraz każdy e-mail wysłany przez naszą stronę aukcyjną może zostać uznany przez filtr skrzynki e-mailowej jako spam.  DLATEGO PROSZĘ SPRAWDZIĆ SWOJĄ SKRZYNKĘ, RÓWNIEŻ SPAM !!!</strong>
<br /><br />
11. Nazwa użytkownika nie może być taka sama jak mail.
<br /><br />
Licytacja odbywa się w sposób przejrzysty i jasny dla użytkowników, istnieją 2 możliwości
licytowania mianowicie:
<br /><br />
***
<br /><br />
Pierwsza poprzez wpisanie do okna sumy i wciśnięcie przycisku oferuj wówczas wpisujemy
najwyższą sumę jaką chcemy zaproponować za gołębia, wówczas system sam będzie
licytował za nas.
<br /><br />
Przykład:
<br /><br />
Pierwszy użytkownik zaoferował 1000 Euro za gołębia, maksymalna kwota jaką chcemy
zaoferować to 2000 Euro – wciskamy oferuj. System przebija naszą cenę na 1100 Euro.
Następny użytkownik chce przebić naszą ofertę i daje 1200 Euro , jednak system znów sam
przebija naszą ofertę i aktualne cena to 1300 Euro.
<br /><br />
Progi przebijania są stałe:
<br /><br />
− gdy cena aukcji jest od 0 do 500 euro to przebicie o 10 euro
<br /><br />
− gdy cena aukcji jest od 500 do 1000 euro to przebicie o 20 euro
<br /><br />
− powyżej 1000 euro przebicie o 100 euro w górę
<br /><br />
***
<br /><br />
Druga opcja poprzez wpisanie do okna sumy i wciśnięcie przycisku licytuj wówczas
wpisujemy sumę jaką chcemy zaproponować za gołębia, wówczas suma automatycznie
ustawi się na aukcji
<br /><br />
Przykład
<br /><br />
Cena wywoławcza 50 Euro chcemy zalicytować gołębia za 1000 Euro wówczas przebicie
następuje bez progów przebijania i aktualna cena to 1000 Euro
</p>

<?php elseif($sf_user->getCulture() == 'en'): ?>

<p>	
1 In bidding pigeons can participate only person previously registered (this can be done in registration tab).
<br /><br />
2 When the auction is visible only person registered nickname in the service and its country of origin. All other data are reserved.
<br /><br />
3 After the auction the buyer gets the account number, you must pay a deposit for the auctioned pigeons
<br /><br />
4 A person commits the bidder to buy a dove, and the issuer to sell the auctioned amount. In the event that the buyer withdrew from the completion of the transaction, that person will be removed from the group of users i will not be able to participate in other auctions organized by our auction page.
<br /><br />
5 The costs of providing the purchaser pigeon after establishing the principles of the seller
<br /><br />
6 If the offer is made to purchase a pigeon in the last 15 minutes of the end of the auction, the date of completion of the auction will be automatically extended for a further 15 minutes.
<br /><br />
7 In case the transaction is not completed by the buyer-pigeon, that person will be removed from the list of users and their data exchanges will be posted to warn other potential customers.
<br /><br />
8 With reference to paragraph 7, the user bidder who does not pay for wylicytowanego pigeon, is obliged to pay 30% of the hammer amount to cover the cost of issuing auction and material losses incurred by the issuer. In the absence of payment of the matter will be referred to the relevant law enforcement authorities to recover money (the prosecutor)
<br /><br />
9 Aukcję first person who made ​​the highest bid, or if the same amount given by 2 users wins, who first made ​​an offer.
<br /><br />
<strong>10 E-mail activation and every e-mail sent through our auction can be recognized by the filter e-mail inbox as spam. SO PLEASE CHECK YOUR BOX, ALSO SPAM!</strong>
<br /><br />
11 Username can not be the same as the mail.
<br /><br />
Bidding takes place in a transparent and clear for users, there are 2 possibilities bidding namely:
<br /><br />
***
<br /><br />
First by entering the amount in the box and pressing enter offer the highest amount you want to offer a dove, then the system will bid alone for us.
<br /><br />
Example:
<br /><br />
First you offered 1000 Euro for the pigeon, the maximum amount that we want to offer is 2000 Euro - press offering. The beats our prices for 1100 Euro. Next you want to raise our offer and give the Euro 1200, but the system itself trumps again our offer and the current price is 1300 Euro.
Piercing thresholds are fixed:
<br /><br />
- The price of the auction is from 0 to 500 euros a breakdown of the 10 euro
<br /><br />
- The price of the auction is between 500 and 1000 euros a breakdown of the 20 euro
<br /><br />
- Over 1000 euro to 100 euro puncture up
<br /><br />
***
<br /><br />
The second option by entering the amount in the box and pressing the bid on the type in the amount you want to offer a dove, the sum will automatically set itself up for auction
<br /><br />
Example
<br /><br />
Asking price 50 Euro we want to bid for the 1000 Euro pigeon penetration occurs without the piercing thresholds and the actual price is 1000 Euro
</p>

<?php elseif($sf_user->getCulture() == 'cn'): ?>
<p>
第一招投標中的鴿子可以參加註冊（註冊“選項卡，可以做到這一點）的唯一的人。
<br /><br />
第二當拍賣是可見的唯一的人，在服務中註冊的暱稱和其原籍國。所有其他的數據被保留。
<br /><br />
第3拍賣結束後，買方獲得的帳號，應該拍賣支付的存款鴿子
<br /><br />
第4一個人犯下的投標人購買一隻鴿子，發行人出售拍賣的金額。 ，買方退出交易完成後，事件，那個人會被刪除的用戶組，我將無法參加我們的拍賣舉辦的拍賣。
<br /><br />
第5後建立的賣家的原則提供買主鴿的成本
<br /><br />
第6如果國家提出購買一隻鴿子在拍賣結束的最後15分鐘，拍賣完成之日起將被自動延長另外15分鐘。
<br /><br />
第7情況下，交易未完成，由買方鴿，那人將被刪除的用戶列表，將公佈他們的數據交換，以警告其他潛在客戶。
<br /><br />
第8第7段，的用戶投標人不支付wygranego1鴿子，必須支付30％的的錘子量的拍賣和物質損失由發行人發行的費用。在沒有付款的問題會轉交相關執法機關收回款項（檢察官）
<br /><br />
9日拍卖获胜谁出价最高的人，或2个用户，如果同样的金额，赢了，谁第一个提出收购要约。
<br /><br />
<strong>第10可以识别的垃圾邮件过滤器的电子邮件收件箱中的电子邮件激活和发送的每封电子邮件通过我们的拍卖。所以请检查你的箱子，垃圾邮件！<strong>
<br /><br />
用户名不能是相同的作为邮件。
<br /><br />
招標發生在一個透明和清晰，為用戶，有兩種可能性招標即：
<br /><br />
***
<br /><br />
首先在框中輸入量，按回車鍵提供了最高的你想提供一個鴿子，然後系統將申辦單獨。
<br /><br />
示例：
<br /><br />
首先，你提供1000歐元的鴿子，我們希望提供的最高金額為2000歐元 - 按發售。比我們的價格為1100歐元。下一步要提高我們的報價，並給歐元1200，但系統本身勝過再次我方的報價，目前的價格是1300歐元。
<br /><br />
穿刺閾值是固定的：
<br /><br />
- 價格拍賣是從0到500歐元的10歐元的細分
<br /><br />
- 的拍賣價格是500至1000歐元崩潰的20歐元
<br /><br />
- 超過1000歐元的100歐元穿刺起來
<br /><br />
***
<br /><br />
第二個選項輸入量的方塊中，然後按出價的金額，你要提供一個鴿子的類型，金額將自動設定本身拿出來拍賣
<br /><br />
例子
<br /><br />
售價50歐元我們要出價為1000歐元鴿子滲透的發生沒有刺耳的閾值和實際價格為1000歐元
</p>
<? endif; ?>