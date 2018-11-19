<?php 
    if (isset($CartSuccess)) {
       echo "<div id=\"note\">
                $CartSuccess
            </div>"; 
    }elseif (isset($CartError)) {
        echo "<div style='background-color:red' id=\"note\">
                $CartError
            </div>"; 
    }elseif (isset($WishlistSuccess)) {
       echo "<div id=\"note\">
                $WishlistSuccess
            </div>"; 
    }elseif (isset($WishlistError)) {
        echo "<div style='background-color:red' id=\"note\">
                $WishlistError
            </div>"; 
    }
    elseif (isset($MailingListSuccess)) {
       echo "<div id=\"note\">
                $MailingListSuccess
            </div>"; 
    }elseif (isset($MailingListError)) {
        echo "<div style='background-color:red' id=\"note\">
                $MailingListError
            </div>"; 
    }elseif (isset($CheckoutSuccess)) {
       echo "<div id=\"note\">
                $CheckoutSuccess
            </div>"; 
    }elseif (isset($CheckoutError)) {
        echo "<div style='background-color:red' id=\"note\">
                $CheckoutError
            </div>"; 
    }elseif (isset($UpdateCartSuccessMessage)) {
        echo "<div style='background-color:green' id=\"note\">
                $UpdateCartSuccessMessage
            </div>"; 
    }elseif (isset($RemoveItemFromCartSuccess)) {
        echo "<div id=\"note\">
                $RemoveItemFromCartSuccess
            </div>"; 
    }elseif (isset($RemoveItemFromCartError)) {
        echo "<div style='background-color:red' id=\"note\">
                    $RemoveItemFromCartError
                </div>"; 
    }
    elseif (isset($SuccessMessage)) {
        echo "<div id=\"note\">
                $SuccessMessage
            </div>"; 
    }elseif (isset($ErrorMessage)) {
        echo "<div style='background-color:red' id=\"note\">
                    $ErrorMessage
                </div>"; 
    }
?>