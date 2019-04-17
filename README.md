# test-cosmos

How to use.

docker run -i -t rioriost/test-cosmos --env COSMOS_URI=https://REPLACEHERE.documents.azure.com:443 --env COSMOS_KEY="PrimaryOrSecondaryKey==" --env DB_ID="test_db" --env COL_ID="test_collection"

Actual example with READ-ONLY KEY

docker run -i -t rioriost/test-cosmos --env COSMOS_URI=https://riotestcosmosdbcore.documents.azure.com:443 --env COSMOS_KEY="ofSDivG4ntrVaKt2yIAjraNhKraXaCq9WN7ndWlZ8vy467vwynOFn68ieJF0rG7bQwXcTbzZmHFZRTJH03741A==" --env DB_ID="salmonrun" --env COL_ID="jobs"
