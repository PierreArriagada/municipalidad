import json

transcript_path = '/home/pierre/.gemini/antigravity-ide/brain/ae091288-745b-4690-98a3-8c93f6075711/.system_generated/logs/transcript.jsonl'
applied = 0
failed = 0

edits = []
with open(transcript_path, 'r') as f:
    for line in f:
        try:
            data = json.loads(line)
            if 'tool_calls' in data:
                for call in data['tool_calls']:
                    if call['name'] in ['replace_file_content', 'multi_replace_file_content']:
                        args = call['args']
                        target_file = args.get('TargetFile', '').strip('"')
                        if target_file.endswith('.css'):
                            if call['name'] == 'replace_file_content':
                                edits.append({
                                    'file': target_file,
                                    'target': args.get('TargetContent', ''),
                                    'replacement': args.get('ReplacementContent', '')
                                })
                            else:
                                chunks = args.get('ReplacementChunks', [])
                                if isinstance(chunks, str):
                                    chunks = json.loads(chunks)
                                for chunk in chunks:
                                    edits.append({
                                        'file': target_file,
                                        'target': chunk.get('TargetContent', ''),
                                        'replacement': chunk.get('ReplacementContent', '')
                                    })
        except Exception as e:
            pass

# deduplicate edits to avoid applying same patch twice
unique_edits = []
seen = set()
for edit in edits:
    sig = (edit['file'], edit['target'], edit['replacement'])
    if sig not in seen:
        seen.add(sig)
        unique_edits.append(edit)

for edit in unique_edits:
    try:
        with open(edit['file'], 'r') as f:
            content = f.read()
        
        # Un-escape the json literal string if it has double backslashes
        # The tool arguments from transcript are strings that were JSON serialized
        target = edit['target']
        # The target string in transcript might have \n as actual characters or literal \n
        # since json.loads parses the first layer, let's try direct replace
        
        # actually, if the script parses the json, target is a python string with actual newlines.
        if target in content:
            new_content = content.replace(target, edit['replacement'])
            with open(edit['file'], 'w') as f:
                f.write(new_content)
            applied += 1
            print(f"Applied patch to {edit['file']}")
        else:
            # Maybe the newlines are literal '\n' string
            target_unescaped = target.replace('\\n', '\n').replace('\\"', '"').replace('\\\\', '\\')
            replacement_unescaped = edit['replacement'].replace('\\n', '\n').replace('\\"', '"').replace('\\\\', '\\')
            
            if target_unescaped in content:
                new_content = content.replace(target_unescaped, replacement_unescaped)
                with open(edit['file'], 'w') as f:
                    f.write(new_content)
                applied += 1
                print(f"Applied patch (unescaped) to {edit['file']}")
            else:
                # Target already replaced? Check if replacement is there
                if replacement_unescaped in content or edit['replacement'] in content:
                    print(f"Patch already applied in {edit['file']}")
                else:
                    print(f"FAILED to apply patch to {edit['file']}")
                    print("--- TARGET WAS ---")
                    print(target_unescaped)
                    failed += 1
    except Exception as e:
        print(f"Error on {edit['file']}: {e}")

print(f"Total applied: {applied}, Failed: {failed}")
